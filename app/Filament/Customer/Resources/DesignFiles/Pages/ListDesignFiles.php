<?php

namespace App\Filament\Customer\Resources\DesignFiles\Pages;

use App\Filament\Customer\Resources\DesignFiles\DesignFileResource;
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
