<?php

namespace App\Filament\Production\Resources\ProductionProgress\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductionProgressForm
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
                TextInput::make('stage_id')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options([
            'not_started' => 'Not started',
            'in_progress' => 'In progress',
            'completed' => 'Completed',
            'on_hold' => 'On hold',
            'cancelled' => 'Cancelled',
            'rejected' => 'Rejected',
        ])
                    ->default('not_started')
                    ->required(),
                DateTimePicker::make('started_at'),
                DateTimePicker::make('completed_at'),
                DateTimePicker::make('paused_at'),
                TextInput::make('duration')
                    ->numeric()
                    ->default(null),
                TextInput::make('handled_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('progress_percentage')
                    ->required()
                    ->numeric()
                    ->default(0),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('issues')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
