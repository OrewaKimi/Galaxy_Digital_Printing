<?php

namespace App\Filament\Customer\Resources\DesignFiles\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DesignFileInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('order_id')
                    ->numeric(),
                TextEntry::make('item_id')
                    ->numeric(),
                TextEntry::make('file_name'),
                TextEntry::make('file_path'),
                TextEntry::make('file_size'),
                TextEntry::make('file_type'),
                TextEntry::make('mime_type'),
                TextEntry::make('file_category'),
                TextEntry::make('version')
                    ->numeric(),
                TextEntry::make('uploaded_by')
                    ->numeric(),
                TextEntry::make('uploaded_date')
                    ->dateTime(),
                IconEntry::make('is_approved')
                    ->boolean(),
                TextEntry::make('approved_by')
                    ->numeric(),
                TextEntry::make('approved_date')
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
