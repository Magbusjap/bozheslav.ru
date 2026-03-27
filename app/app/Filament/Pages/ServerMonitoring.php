<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ServerMonitoring extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    protected static ?string $navigationLabel = 'Отслеживание';
    protected static ?string $navigationGroup = 'Отслеживание';
    protected static ?int $navigationSort = 1;
    protected static string $view = 'filament.pages.server-monitoring';
}