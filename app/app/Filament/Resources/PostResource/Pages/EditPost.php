<?php
namespace App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('view')
                ->label('Перейти к просмотру')
                ->url(fn () => '/' . $this->record->slug)
                ->openUrlInNewTab()
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->color('gray')
                ->visible(fn () => $this->record->status === 'published'),
            Actions\DeleteAction::make(),
        ];
    }
}
