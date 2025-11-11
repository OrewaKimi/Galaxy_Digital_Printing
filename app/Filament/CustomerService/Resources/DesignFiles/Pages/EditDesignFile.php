<?php

namespace App\Filament\CustomerService\Resources\DesignFiles\Pages;

use App\Filament\CustomerService\Resources\DesignFiles\DesignFileResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditDesignFile extends EditRecord
{
    protected static string $resource = DesignFileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
