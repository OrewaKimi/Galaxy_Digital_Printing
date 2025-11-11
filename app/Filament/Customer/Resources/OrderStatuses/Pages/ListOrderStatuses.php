<?php

namespace App\Filament\Customer\Resources\OrderStatuses\Pages;

use App\Filament\Customer\Resources\OrderStatuses\OrderStatusResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOrderStatuses extends ListRecords
{
    protected static string $resource = OrderStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
