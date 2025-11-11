<?php

namespace App\Filament\Production\Resources\ProductionStages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductionStageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('stage_name')
                    ->required(),
                TextInput::make('stage_code')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('sequence_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('estimated_duration')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('color')
                    ->required()
                    ->default('#000000'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
