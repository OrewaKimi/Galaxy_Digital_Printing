<?php

namespace App\Filament\Designer\Resources\DesignFiles\Pages;

use App\Filament\Designer\Resources\DesignFiles\DesignFileResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDesignFiles extends ListRecords
{
    protected static string $resource = DesignFileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
