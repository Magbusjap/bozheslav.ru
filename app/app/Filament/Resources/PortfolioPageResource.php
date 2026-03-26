<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioPageResource\Pages;
use App\Models\PortfolioPage;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;

class PortfolioPageResource extends Resource
{
    protected static ?string $model = PortfolioPage::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Page-проекты';
    protected static ?string $modelLabel = 'Страница проекта';
    protected static ?string $pluralModelLabel = 'Страницы проектов';
    protected static ?string $navigationGroup = 'Портфолио';
    protected static ?int $navigationSort = 4;
    protected static ?string $slug = 'portfolio-pages';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Заголовок')
                ->required()
                ->maxLength(255)
                ->live(debounce: 800)
                ->afterStateUpdated(function (?string $state, callable $set) {
                    if (!empty($state)) {
                        $set('slug', \Illuminate\Support\Str::slug(transliterate($state)));
                    }
                }),
            Forms\Components\TextInput::make('slug')
                ->label('URL')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true)
                ->prefix('/'),
            Forms\Components\Select::make('status')
                ->label('Статус')
                ->options([
                    'published' => 'Опубликована',
                    'draft'     => 'Черновик',
                ])
                ->default('draft')
                ->required(),
            Forms\Components\Textarea::make('excerpt')
                ->label('Описание')
                ->columnSpanFull(),
            Forms\Components\Builder::make('content')
                ->blocks([
                    Forms\Components\Builder\Block::make('heading')
                        ->label('Заголовок')
                        ->schema([
                            Forms\Components\Select::make('level')
                                ->options(['h2' => 'H2', 'h3' => 'H3'])
                                ->default('h2')
                                ->required(),
                            Forms\Components\TextInput::make('text')
                                ->label('Текст заголовка')
                                ->required(),
                        ]),
                    Forms\Components\Builder\Block::make('text')
                        ->label('Текст')
                        ->schema([
                            TiptapEditor::make('content')
                                ->label('Содержимое')
                                ->required(),
                        ]),
                    Forms\Components\Builder\Block::make('code')
                        ->label('Код')
                        ->schema([
                            Forms\Components\Select::make('language')
                                ->options([
                                    'php' => 'PHP',
                                    'javascript' => 'JavaScript',
                                    'bash' => 'Bash',
                                    'html' => 'HTML',
                                    'css' => 'CSS',
                                    'sql' => 'SQL',
                                ])
                                ->default('php')
                                ->required(),
                            Forms\Components\Textarea::make('code')
                                ->label('Код')
                                ->required()
                                ->rows(10),
                        ]),
                    Forms\Components\Builder\Block::make('image')
                        ->label('Изображение')
                        ->schema([
                            CuratorPicker::make('url')
                                ->label('Изображение')
                                ->buttonLabel('Выбрать изображение')
                                ->required(),
                            Forms\Components\TextInput::make('caption')
                                ->label('Подпись'),
                        ]),
                    Forms\Components\Builder\Block::make('quote')
                        ->label('Цитата')
                        ->schema([
                            Forms\Components\Textarea::make('text')
                                ->label('Текст цитаты')
                                ->required(),
                            Forms\Components\TextInput::make('author')
                                ->label('Автор'),
                        ]),
                    Forms\Components\Builder\Block::make('image_text')
                        ->label('Изображение + текст')
                        ->schema([
                            CuratorPicker::make('url')
                                ->label('Изображение')
                                ->buttonLabel('Выбрать изображение')
                                ->required(),
                            Forms\Components\Select::make('position')
                                ->label('Расположение')
                                ->options(['left' => 'Слева', 'right' => 'Справа'])
                                ->default('left')
                                ->required(),
                            Forms\Components\TextInput::make('width')
                                ->label('Ширина изображения (px)')
                                ->numeric()
                                ->default(300),
                            TiptapEditor::make('text')
                                ->label('Текст')
                                ->required(),
                        ]),
                    Forms\Components\Builder\Block::make('before_after')
                        ->label('Before | After')
                        ->icon('heroicon-o-adjustments-horizontal')
                        ->schema([
                            CuratorPicker::make('before_url')
                                ->label('Изображение ДО')
                                ->buttonLabel('Выбрать До')
                                ->required(),
                            CuratorPicker::make('after_url')
                                ->label('Изображение ПОСЛЕ')
                                ->buttonLabel('Выбрать После')
                                ->required(),
                            Forms\Components\TextInput::make('height')
                                ->label('Высота блока (px)')
                                ->numeric()
                                ->default(500)
                                ->suffix('px'),

                            Forms\Components\TextInput::make('width')
                                ->label('Ширина (px или %)')
                                ->default('100%')
                                ->helperText('Например: 800px или 70%'),
                        ]),
                ])
                ->columnSpanFull(),
            Forms\Components\Section::make('SEO')
                ->collapsed()
                ->schema([
                    Forms\Components\TextInput::make('seo_title')
                        ->label('SEO Title')
                        ->maxLength(60)
                        ->live(debounce: 500)
                        ->helperText(fn ($state) => strlen($state ?? '') . ' / 60 символов'),
                    Forms\Components\Textarea::make('seo_description')
                        ->label('SEO Description')
                        ->maxLength(160)
                        ->rows(3)
                        ->live(debounce: 500)
                        ->helperText(fn ($state) => strlen($state ?? '') . ' / 160 символов'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Заголовок')
                    ->searchable()
                    ->url(fn ($record) => Pages\EditPortfolioPage::getUrl(['record' => $record])),
                Tables\Columns\TextColumn::make('slug')
                    ->label('URL')
                    ->searchable(),
                Tables\Columns\SelectColumn::make('status')
                    ->label('Статус')
                    ->options([
                        'published' => 'Опубликована',
                        'draft'     => 'Черновик',
                    ]),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Обновлено')
                    ->dateTime()
                    ->sortable(),
            ])
            ->recordUrl(
                fn ($record) => Pages\EditPortfolioPage::getUrl(['record' => $record])
            )
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('view')
                    ->label('Просмотр')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->url(fn ($record) => '/portfolio/pages/' . $record->slug)
                    ->openUrlInNewTab()
                    ->color('gray')
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPortfolioPages::route('/'),
            'create' => Pages\CreatePortfolioPage::route('/create'),
            'edit'   => Pages\EditPortfolioPage::route('/{record}/edit'),
        ];
    }
}