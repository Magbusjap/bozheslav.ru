<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Analytics extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'Аналитика';
    protected static ?string $navigationGroup = 'Аналитика';
    protected static ?int $navigationSort = 1;
    protected static string $view = 'filament.pages.analytics';
}