<?php

namespace App\Filament\Customer\Resources\OrderItems\Pages;

use App\Filament\Customer\Resources\OrderItems\OrderItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderItem extends CreateRecord
{
    protected static string $resource = OrderItemResource::class;
}
