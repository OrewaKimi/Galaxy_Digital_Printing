<?php

namespace App\Filament\Customer\Resources\ProductCategories\Pages;

use App\Filament\Customer\Resources\ProductCategories\ProductCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProductCategory extends CreateRecord
{
    protected static string $resource = ProductCategoryResource::class;
}
