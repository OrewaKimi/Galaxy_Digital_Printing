<?php

namespace App\Filament\CustomerService\Resources\PaymentTypes;

use App\Filament\CustomerService\Resources\PaymentTypes\Pages\CreatePaymentType;
use App\Filament\CustomerService\Resources\PaymentTypes\Pages\EditPaymentType;
use App\Filament\CustomerService\Resources\PaymentTypes\Pages\ListPaymentTypes;
use App\Filament\CustomerService\Resources\PaymentTypes\Pages\ViewPaymentType;
use App\Filament\CustomerService\Resources\PaymentTypes\Schemas\PaymentTypeForm;
use App\Filament\CustomerService\Resources\PaymentTypes\Schemas\PaymentTypeInfolist;
use App\Filament\CustomerService\Resources\PaymentTypes\Tables\PaymentTypesTable;
use App\Models\PaymentType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class PaymentTypeResource extends Resource
{
    protected static ?string $model = PaymentType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static string | UnitEnum | null $navigationGroup = 'Transaksi';

    public static function form(Schema $schema): Schema
    {
        return PaymentTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PaymentTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PaymentTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPaymentTypes::route('/'),
            'create' => CreatePaymentType::route('/create'),
            'view' => ViewPaymentType::route('/{record}'),
            'edit' => EditPaymentType::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
