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
            Actions\DeleteAction::make(),
        ];
    }
}
