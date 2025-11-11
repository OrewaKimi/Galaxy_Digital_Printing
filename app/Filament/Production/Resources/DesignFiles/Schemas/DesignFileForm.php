<?php

namespace App\Filament\Production\Resources\DesignFiles\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DesignFileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order_id')
                    ->required()
                    ->numeric(),
                TextInput::make('item_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('file_name')
                    ->required(),
                TextInput::make('file_path')
                    ->required(),
                TextInput::make('file_size')
                    ->default(null),
                TextInput::make('file_type')
                    ->default(null),
                TextInput::make('mime_type')
                    ->default(null),
                Select::make('file_category')
                    ->options([
            'customer_upload' => 'Customer upload',
            'designer_draft' => 'Designer draft',
            'final_design' => 'Final design',
            'revision' => 'Revision',
            'reference' => 'Reference',
        ])
                    ->default('customer_upload')
                    ->required(),
                TextInput::make('version')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('uploaded_by')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('uploaded_date')
                    ->required(),
                Toggle::make('is_approved')
                    ->required(),
                TextInput::make('approved_by')
                    ->numeric()
                    ->default(null),
                DateTimePicker::make('approved_date'),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('rejection_reason')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
