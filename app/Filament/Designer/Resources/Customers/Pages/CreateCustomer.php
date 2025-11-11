<?php

namespace App\Filament\Designer\Resources\Customers\Pages;

use App\Filament\Designer\Resources\Customers\CustomerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;
}
