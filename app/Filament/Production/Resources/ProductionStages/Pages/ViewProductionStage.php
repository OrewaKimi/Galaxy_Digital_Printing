<?php

namespace App\Filament\Production\Resources\ProductionStages\Pages;

use App\Filament\Production\Resources\ProductionStages\ProductionStageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProductionStage extends ViewRecord
{
    protected static string $resource = ProductionStageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
