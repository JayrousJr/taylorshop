<?php

namespace App\Filament\Resources\ImagesliderResource\Pages;

use App\Filament\Resources\ImagesliderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateImageslider extends CreateRecord
{
      protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected static string $resource = ImagesliderResource::class;
}
