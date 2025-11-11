<?php

namespace App\Filament\Customer\Resources\OrderItems\Pages;

use App\Filament\Customer\Resources\OrderItems\OrderItemResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewOrderItem extends ViewRecord
{
    protected static string $resource = OrderItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
