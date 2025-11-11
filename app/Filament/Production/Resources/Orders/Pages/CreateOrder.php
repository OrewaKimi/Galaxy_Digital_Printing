<?php

namespace App\Filament\Production\Resources\Orders\Pages;

use App\Filament\Production\Resources\Orders\OrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;
}
