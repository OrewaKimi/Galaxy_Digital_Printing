<?php

namespace App\Filament\CustomerService\Resources\ProductCategories\Pages;

use App\Filament\CustomerService\Resources\ProductCategories\ProductCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProductCategory extends CreateRecord
{
    protected static string $resource = ProductCategoryResource::class;
}
