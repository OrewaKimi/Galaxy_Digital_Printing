<?php

namespace App\Filament\Production\Resources\InventoryTransactions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class InventoryTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('transaction_number')
                    ->required(),
                TextInput::make('material_id')
                    ->required()
                    ->numeric(),
                Select::make('transaction_type')
                    ->options([
            'in' => 'In',
            'out' => 'Out',
            'adjustment' => 'Adjustment',
            'return' => 'Return',
            'waste' => 'Waste',
        ])
                    ->default('out')
                    ->required(),
                TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                TextInput::make('price_per_unit')
                    ->numeric()
                    ->default(null),
                TextInput::make('total_cost')
                    ->numeric()
                    ->default(null),
                TextInput::make('stock_before')
                    ->numeric()
                    ->default(null),
                TextInput::make('stock_after')
                    ->numeric()
                    ->default(null),
                TextInput::make('order_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('item_id')
                    ->numeric()
                    ->default(null),
                DateTimePicker::make('transaction_date')
                    ->required(),
                TextInput::make('reference_number')
                    ->default(null),
                TextInput::make('supplier_invoice')
                    ->default(null),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('handled_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('approved_by')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
