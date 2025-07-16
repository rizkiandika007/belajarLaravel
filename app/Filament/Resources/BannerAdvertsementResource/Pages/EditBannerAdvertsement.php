<?php

namespace App\Filament\Resources\BannerAdvertsementResource\Pages;

use App\Filament\Resources\BannerAdvertsementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBannerAdvertsement extends EditRecord
{
    protected static string $resource = BannerAdvertsementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
