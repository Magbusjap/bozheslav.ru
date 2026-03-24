<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

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
            Actions\Action::make('preview')
                ->label('Просмотр черновика')
                ->url(fn () => '/' . $this->record->slug)
                ->openUrlInNewTab()
                ->icon('heroicon-o-eye')
                ->color('warning')
                ->visible(fn () => $this->record->status === 'draft'),
            Actions\DeleteAction::make(),
        ];
    }
}
