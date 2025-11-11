<?php

namespace App\Filament\CustomerService\Resources\PaymentTypes\Pages;

use App\Filament\CustomerService\Resources\PaymentTypes\PaymentTypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPaymentType extends ViewRecord
{
    protected static string $resource = PaymentTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
