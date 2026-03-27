<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class AdminSettings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Настройки админки';
    protected static ?string $navigationGroup = 'Настройки';
    protected static ?int $navigationSort = 3;
    protected static string $view = 'filament.pages.admin-settings';
}