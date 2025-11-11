<?php

namespace App\Filament\Production\Resources\ProductionProgress\Pages;

use App\Filament\Production\Resources\ProductionProgress\ProductionProgressResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProductionProgress extends ViewRecord
{
    protected static string $resource = ProductionProgressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
