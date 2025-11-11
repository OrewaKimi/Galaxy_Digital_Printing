<?php

namespace App\Filament\Production\Resources\Materials\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MaterialInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('material_name'),
                TextEntry::make('material_code'),
                TextEntry::make('price_per_unit')
                    ->numeric(),
                TextEntry::make('stock_quantity')
                    ->numeric(),
                TextEntry::make('unit'),
                TextEntry::make('minimum_stock')
                    ->numeric(),
                TextEntry::make('supplier_name'),
                TextEntry::make('supplier_contact'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                TextEntry::make('deleted_at')
                    ->dateTime(),
            ]);
    }
}
