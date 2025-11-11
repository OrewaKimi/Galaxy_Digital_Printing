<?php

namespace App\Filament\Production\Resources\ProductionStages\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductionStageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('stage_name'),
                TextEntry::make('stage_code'),
                TextEntry::make('sequence_order')
                    ->numeric(),
                TextEntry::make('estimated_duration')
                    ->numeric(),
                TextEntry::make('color'),
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
