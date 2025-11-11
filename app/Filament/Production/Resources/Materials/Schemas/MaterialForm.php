<?php

namespace App\Filament\Production\Resources\Materials\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MaterialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('material_name')
                    ->required(),
                TextInput::make('material_code')
                    ->default(null),
                TextInput::make('price_per_unit')
                    ->required()
                    ->numeric(),
                TextInput::make('stock_quantity')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                Select::make('unit')
                    ->options([
            'm2' => 'M2',
            'lembar' => 'Lembar',
            'roll' => 'Roll',
            'kg' => 'Kg',
            'meter' => 'Meter',
            'pcs' => 'Pcs',
        ])
                    ->default('m2')
                    ->required(),
                TextInput::make('minimum_stock')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('supplier_name')
                    ->default(null),
                TextInput::make('supplier_contact')
                    ->default(null),
                Textarea::make('supplier_address')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
