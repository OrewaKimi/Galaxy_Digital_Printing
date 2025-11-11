<?php

namespace App\Filament\Production\Resources\ProductionStages;

use App\Filament\Production\Resources\ProductionStages\Pages\CreateProductionStage;
use App\Filament\Production\Resources\ProductionStages\Pages\EditProductionStage;
use App\Filament\Production\Resources\ProductionStages\Pages\ListProductionStages;
use App\Filament\Production\Resources\ProductionStages\Pages\ViewProductionStage;
use App\Filament\Production\Resources\ProductionStages\Schemas\ProductionStageForm;
use App\Filament\Production\Resources\ProductionStages\Schemas\ProductionStageInfolist;
use App\Filament\Production\Resources\ProductionStages\Tables\ProductionStagesTable;
use App\Models\ProductionStage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class ProductionStageResource extends Resource
{
    protected static ?string $model = ProductionStage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedQueueList;

    protected static string | UnitEnum | null $navigationGroup = 'Produksi';

    public static function form(Schema $schema): Schema
    {
        return ProductionStageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProductionStageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductionStagesTable::configure($table);
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
            'index' => ListProductionStages::route('/'),
            'create' => CreateProductionStage::route('/create'),
            'view' => ViewProductionStage::route('/{record}'),
            'edit' => EditProductionStage::route('/{record}/edit'),
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
