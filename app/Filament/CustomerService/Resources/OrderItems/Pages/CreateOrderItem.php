<?php

namespace App\Filament\CustomerService\Resources\OrderItems\Pages;

use App\Filament\CustomerService\Resources\OrderItems\OrderItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderItem extends CreateRecord
{
    protected static string $resource = OrderItemResource::class;
}
