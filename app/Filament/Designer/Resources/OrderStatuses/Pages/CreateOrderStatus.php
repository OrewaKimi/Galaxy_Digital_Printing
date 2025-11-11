<?php

namespace App\Filament\Designer\Resources\OrderStatuses\Pages;

use App\Filament\Designer\Resources\OrderStatuses\OrderStatusResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderStatus extends CreateRecord
{
    protected static string $resource = OrderStatusResource::class;
}
