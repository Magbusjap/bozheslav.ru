<?php

namespace App\Filament\Resources\PortfolioPageResource\Pages;

use App\Filament\Resources\PortfolioPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioPage extends EditRecord
{
    protected static string $resource = PortfolioPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('view')
                ->label('Просмотр')
                ->url(fn () => '/portfolio/pages/' . $this->record->slug)
                ->openUrlInNewTab()
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->color('gray')
                ->visible(fn () => $this->record->status === 'published'),
            Actions\Action::make('preview')
                ->label('Просмотр черновика')
                ->url(fn () => '/portfolio/pages/' . $this->record->slug)
                ->openUrlInNewTab()
                ->icon('heroicon-o-eye')
                ->color('warning')
                ->visible(fn () => $this->record->status === 'draft'),
            Actions\DeleteAction::make(),
        ];
    }
}
