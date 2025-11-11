<?php

namespace App\Filament\Production\Resources\InventoryTransactions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InventoryTransactionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('transaction_number'),
                TextEntry::make('material_id')
                    ->numeric(),
                TextEntry::make('transaction_type'),
                TextEntry::make('quantity')
                    ->numeric(),
                TextEntry::make('price_per_unit')
                    ->numeric(),
                TextEntry::make('total_cost')
                    ->numeric(),
                TextEntry::make('stock_before')
                    ->numeric(),
                TextEntry::make('stock_after')
                    ->numeric(),
                TextEntry::make('order_id')
                    ->numeric(),
                TextEntry::make('item_id')
                    ->numeric(),
                TextEntry::make('transaction_date')
                    ->dateTime(),
                TextEntry::make('reference_number'),
                TextEntry::make('supplier_invoice'),
                TextEntry::make('handled_by')
                    ->numeric(),
                TextEntry::make('approved_by')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                TextEntry::make('deleted_at')
                    ->dateTime(),
            ]);
    }
}
