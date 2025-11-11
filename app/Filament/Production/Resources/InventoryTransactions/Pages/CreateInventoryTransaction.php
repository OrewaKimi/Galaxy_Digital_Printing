<?php

namespace App\Filament\Production\Resources\InventoryTransactions\Pages;

use App\Filament\Production\Resources\InventoryTransactions\InventoryTransactionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInventoryTransaction extends CreateRecord
{
    protected static string $resource = InventoryTransactionResource::class;
}
