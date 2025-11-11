<?php

namespace App\Filament\Customer\Resources\Payments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('payment_number')
                    ->required(),
                TextInput::make('order_id')
                    ->required()
                    ->numeric(),
                TextInput::make('payment_type_id')
                    ->required()
                    ->numeric(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('payment_percentage')
                    ->numeric()
                    ->default(null),
                Select::make('payment_method')
                    ->options([
            'cash' => 'Cash',
            'transfer' => 'Transfer',
            'credit_card' => 'Credit card',
            'debit_card' => 'Debit card',
            'e-wallet' => 'E wallet',
            'other' => 'Other',
        ])
                    ->default('cash')
                    ->required(),
                Select::make('payment_status')
                    ->options([
            'pending' => 'Pending',
            'completed' => 'Completed',
            'failed' => 'Failed',
            'refunded' => 'Refunded',
            'cancelled' => 'Cancelled',
        ])
                    ->default('pending')
                    ->required(),
                DateTimePicker::make('payment_date')
                    ->required(),
                TextInput::make('transaction_reference')
                    ->default(null),
                TextInput::make('bank_name')
                    ->default(null),
                TextInput::make('account_number')
                    ->default(null),
                TextInput::make('account_name')
                    ->default(null),
                Textarea::make('payment_proof')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('received_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('verified_by')
                    ->numeric()
                    ->default(null),
                DateTimePicker::make('verification_date'),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('rejection_reason')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
