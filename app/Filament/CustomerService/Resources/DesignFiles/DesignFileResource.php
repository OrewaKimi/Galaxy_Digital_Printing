<?php

namespace App\Filament\CustomerService\Resources\DesignFiles;

use App\Filament\CustomerService\Resources\DesignFiles\Pages\CreateDesignFile;
use App\Filament\CustomerService\Resources\DesignFiles\Pages\EditDesignFile;
use App\Filament\CustomerService\Resources\DesignFiles\Pages\ListDesignFiles;
use App\Filament\CustomerService\Resources\DesignFiles\Pages\ViewDesignFile;
use App\Filament\CustomerService\Resources\DesignFiles\Schemas\DesignFileForm;
use App\Filament\CustomerService\Resources\DesignFiles\Schemas\DesignFileInfolist;
use App\Filament\CustomerService\Resources\DesignFiles\Tables\DesignFilesTable;
use App\Models\DesignFile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class DesignFileResource extends Resource
{
    protected static ?string $model = DesignFile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static string | UnitEnum | null $navigationGroup = 'Produk & Material';

    public static function form(Schema $schema): Schema
    {
        return DesignFileForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DesignFileInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DesignFilesTable::configure($table);
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
            'index' => ListDesignFiles::route('/'),
            'create' => CreateDesignFile::route('/create'),
            'view' => ViewDesignFile::route('/{record}'),
            'edit' => EditDesignFile::route('/{record}/edit'),
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
