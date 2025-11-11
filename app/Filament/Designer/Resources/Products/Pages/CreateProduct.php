<?php

namespace App\Filament\Designer\Resources\Products\Pages;

use App\Filament\Designer\Resources\Products\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
}
