<?php

namespace App\Filament\Resources\BannerAdvertsementResource\Pages;

use App\Filament\Resources\BannerAdvertsementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBannerAdvertsements extends ListRecords
{
    protected static string $resource = BannerAdvertsementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
