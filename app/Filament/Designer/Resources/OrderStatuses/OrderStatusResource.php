<?php

namespace App\Filament\Designer\Resources\OrderStatuses;

use App\Filament\Designer\Resources\OrderStatuses\Pages\CreateOrderStatus;
use App\Filament\Designer\Resources\OrderStatuses\Pages\EditOrderStatus;
use App\Filament\Designer\Resources\OrderStatuses\Pages\ListOrderStatuses;
use App\Filament\Designer\Resources\OrderStatuses\Pages\ViewOrderStatus;
use App\Filament\Designer\Resources\OrderStatuses\Schemas\OrderStatusForm;
use App\Filament\Designer\Resources\OrderStatuses\Schemas\OrderStatusInfolist;
use App\Filament\Designer\Resources\OrderStatuses\Tables\OrderStatusesTable;
use App\Models\OrderStatus;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class OrderStatusResource extends Resource
{
    protected static ?string $model = OrderStatus::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCheckCircle;
    
    protected static string | UnitEnum | null $navigationGroup = 'Produksi';

    public static function form(Schema $schema): Schema
    {
        return OrderStatusForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return OrderStatusInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrderStatusesTable::configure($table);
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
            'index' => ListOrderStatuses::route('/'),
            'create' => CreateOrderStatus::route('/create'),
            'view' => ViewOrderStatus::route('/{record}'),
            'edit' => EditOrderStatus::route('/{record}/edit'),
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
