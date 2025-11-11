<?php

namespace App\Filament\Production\Resources\DesignFiles\Pages;

use App\Filament\Production\Resources\DesignFiles\DesignFileResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDesignFile extends ViewRecord
{
    protected static string $resource = DesignFileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
