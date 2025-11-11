<?php

namespace App\Filament\Production\Resources\OrderStatuses\Pages;

use App\Filament\Production\Resources\OrderStatuses\OrderStatusResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderStatus extends CreateRecord
{
    protected static string $resource = OrderStatusResource::class;
}
