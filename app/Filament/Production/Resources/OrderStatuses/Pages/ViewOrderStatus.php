<?php

namespace App\Filament\Production\Resources\OrderStatuses\Pages;

use App\Filament\Production\Resources\OrderStatuses\OrderStatusResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewOrderStatus extends ViewRecord
{
    protected static string $resource = OrderStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
