<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmailMediaResource\Pages;
use App\Models\EmailMedia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;

class EmailMediaResource extends Resource
{
    protected static ?string $model = EmailMedia::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Рассылки';
    protected static ?string $navigationLabel = 'Email Медиа';
    protected static ?string $modelLabel = 'Медиафайл';
    protected static ?string $pluralModelLabel = 'Email Медиа';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Загрузка файлов')
                    ->schema([
                        Forms\Components\TextInput::make('folder')
                            ->label('Папка')
                            ->placeholder('например: welcome-letter')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Латиница, без пробелов. Для каждого письма своя папка.'),

                        Forms\Components\FileUpload::make('path')
                            ->label('Изображение')
                            ->image()
                            ->required()
                            ->disk('public')
                            ->directory(fn (Forms\Get $get) => 'email-media/' . ($get('folder') ?: 'default'))
                            ->storeFileNamesIn('filename')
                            ->maxSize(5120)
                            ->afterStateUpdated(function ($state, Forms\Set $set, Forms\Get $get) {
                                if ($state) {
                                    $set('mime_type', mime_content_type(Storage::disk('public')->path($state)));
                                    $set('size', Storage::disk('public')->size($state));
                                }
                            })
                            ->live(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('path')
                    ->label('Превью')
                    ->disk('public')
                    ->square()
                    ->size(80),

                Tables\Columns\TextColumn::make('folder')
                    ->label('Папка')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('filename')
                    ->label('Файл')
                    ->searchable(),

                Tables\Columns\TextColumn::make('size')
                    ->label('Размер')
                    ->formatStateUsing(fn ($state) => $state ? round($state / 1024, 1) . ' KB' : '—')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Загружен')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('folder')
                    ->label('Папка')
                    ->options(fn () => EmailMedia::query()
                        ->distinct()
                        ->pluck('folder', 'folder')
                        ->toArray()),
            ])
            ->actions([
                Tables\Actions\Action::make('copy_url')
                    ->label('Скопировать ссылку')
                    ->icon('heroicon-o-clipboard')
                    ->action(function (EmailMedia $record) {
                        Notification::make()
                            ->title('Ссылка: ' . asset('storage/' . $record->path))
                            ->success()
                            ->send();
                    }),

                Tables\Actions\EditAction::make()->label(''),
                Tables\Actions\DeleteAction::make()
                    ->label('')
                    ->after(fn (EmailMedia $record) => Storage::disk('public')->delete($record->path)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmailMedia::route('/'),
            'create' => Pages\CreateEmailMedia::route('/create'),
            'edit' => Pages\EditEmailMedia::route('/{record}/edit'),
        ];
    }
}