<?php

namespace App\Filament\Customer\Resources\OrderStatuses\Pages;

use App\Filament\Customer\Resources\OrderStatuses\OrderStatusResource;
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
