<?php

namespace App\Filament\Customer\Resources\Payments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PaymentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('payment_number'),
                TextEntry::make('order_id')
                    ->numeric(),
                TextEntry::make('payment_type_id')
                    ->numeric(),
                TextEntry::make('amount')
                    ->numeric(),
                TextEntry::make('payment_percentage')
                    ->numeric(),
                TextEntry::make('payment_method'),
                TextEntry::make('payment_status'),
                TextEntry::make('payment_date')
                    ->dateTime(),
                TextEntry::make('transaction_reference'),
                TextEntry::make('bank_name'),
                TextEntry::make('account_number'),
                TextEntry::make('account_name'),
                TextEntry::make('received_by')
                    ->numeric(),
                TextEntry::make('verified_by')
                    ->numeric(),
                TextEntry::make('verification_date')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                TextEntry::make('deleted_at')
                    ->dateTime(),
            ]);
    }
}
