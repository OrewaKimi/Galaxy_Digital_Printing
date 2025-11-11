<?php

namespace App\Filament\CustomerService\Resources\OrderStatuses\Pages;

use App\Filament\CustomerService\Resources\OrderStatuses\OrderStatusResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderStatus extends CreateRecord
{
    protected static string $resource = OrderStatusResource::class;
}
