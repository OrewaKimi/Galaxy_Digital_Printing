<?php

namespace App\Filament\CustomerService\Resources\PaymentTypes\Pages;

use App\Filament\CustomerService\Resources\PaymentTypes\PaymentTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePaymentType extends CreateRecord
{
    protected static string $resource = PaymentTypeResource::class;
}
