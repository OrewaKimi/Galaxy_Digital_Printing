<?php

namespace App\Filament\Production\Resources\ProductionProgress\Pages;

use App\Filament\Production\Resources\ProductionProgress\ProductionProgressResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProductionProgress extends CreateRecord
{
    protected static string $resource = ProductionProgressResource::class;
}
