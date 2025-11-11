<?php

namespace App\Filament\Customer\Resources\OrderStatuses\Pages;

use App\Filament\Customer\Resources\OrderStatuses\OrderStatusResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderStatus extends CreateRecord
{
    protected static string $resource = OrderStatusResource::class;
}
