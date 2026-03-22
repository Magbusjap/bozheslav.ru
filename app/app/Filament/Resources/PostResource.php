<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Actions\Action;
use Filament\Infolists\Components\Actions\Action as InfolistAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
		    ->required()
		    ->maxLength(255),
		Forms\Components\Select::make('category_id')
		        ->label('Category')
			->relationship('category', 'name')
			->required(),
                Forms\Components\Textarea::make('excerpt')
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
	                Forms\Components\FileUpload::make('url')
	                    ->label('Изображение')
	                    ->image()
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
	    ])
	    ->columnSpanFull(),
                Forms\Components\FileUpload::make('cover_image')
                    ->image(),
                Forms\Components\Select::make('status')
					->options([
						'draft' => 'Черновик',
						'published' => 'Опубликован',
					])
					->selectablePlaceholder(false)
					->default('draft')
					->required(),
					]);
    }

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('title')
					->searchable()
					->extraAttributes(['style' => 'cursor: pointer; text-decoration: none;'])
    				->extraAttributes(['onmouseover' => 'this.style.textDecoration="underline"', 'onmouseout' => 'this.style.textDecoration="none"']),
				Tables\Columns\TextColumn::make('slug')
					->searchable(),
				Tables\Columns\ImageColumn::make('cover_image'),
				Tables\Columns\SelectColumn::make('status')
					->options([
						'draft' => 'Черновик',
						'published' => 'Опубликован',
					])
					->selectablePlaceholder(false),
				Tables\Columns\TextColumn::make('created_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
				Tables\Columns\TextColumn::make('updated_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
			])
			->recordUrl(
				fn ($record) => Pages\EditPost::getUrl(['record' => $record])
			)
			->filters([
				//
			])
			->actions([
				Tables\Actions\EditAction::make(),
				Tables\Actions\Action::make('view')
					->label('Просмотр')
					->icon('heroicon-o-arrow-top-right-on-square')
					->url(fn ($record) => '/' . $record->slug)
					->openUrlInNewTab()
					->color('gray'),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
				]),
			]);
	}

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

	

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
