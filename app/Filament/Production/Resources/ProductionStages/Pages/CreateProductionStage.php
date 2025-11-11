<?php

namespace App\Filament\Production\Resources\ProductionStages\Pages;

use App\Filament\Production\Resources\ProductionStages\ProductionStageResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProductionStage extends CreateRecord
{
    protected static string $resource = ProductionStageResource::class;
}
