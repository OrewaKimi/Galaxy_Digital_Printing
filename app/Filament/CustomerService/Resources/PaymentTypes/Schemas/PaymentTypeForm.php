<?php

namespace App\Filament\CustomerService\Resources\PaymentTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PaymentTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('type_name')
                    ->required(),
                TextInput::make('type_code')
                    ->required(),
                TextInput::make('minimum_percentage')
                    ->numeric()
                    ->default(null),
                TextInput::make('maximum_percentage')
                    ->numeric()
                    ->default(null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
