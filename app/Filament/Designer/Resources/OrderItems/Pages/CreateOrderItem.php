<?php

namespace App\Filament\Designer\Resources\OrderItems\Pages;

use App\Filament\Designer\Resources\OrderItems\OrderItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderItem extends CreateRecord
{
    protected static string $resource = OrderItemResource::class;
}
