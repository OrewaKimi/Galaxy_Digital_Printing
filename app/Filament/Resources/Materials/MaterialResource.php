<?php

namespace App\Filament\Resources\Materials;

use App\Filament\Resources\Materials\Pages\ManageMaterials;
use App\Models\Material;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class MaterialResource extends Resource
{
    protected static ?string $model = Material::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArchiveBox;

    protected static string | UnitEnum | null $navigationGroup = 'Produk & Material';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('material_name')->label('Nama Material')->required(),
            TextInput::make('material_code')->label('Kode Material')->default(null),
            TextInput::make('price_per_unit')->label('Harga per Satuan')->required()->numeric(),
            TextInput::make('stock_quantity')->label('Stok')->required()->numeric()->default(0.0),

            Select::make('unit')
                ->label('Satuan')
                ->options([
                    'm2' => 'Meter Persegi (m²)',
                    'lembar' => 'Lembar',
                    'roll' => 'Roll',
                    'kg' => 'Kilogram (kg)',
                    'meter' => 'Meter',
                    'pcs' => 'Pcs',
                ])
                ->default('m2')
                ->required()
                ->searchable(),

            TextInput::make('minimum_stock')->label('Stok Minimum')->required()->numeric()->default(0.0),
            TextInput::make('supplier_name')->label('Nama Supplier')->default(null),
            TextInput::make('supplier_contact')->label('Kontak Supplier')->default(null),
            Textarea::make('supplier_address')->label('Alamat Supplier')->default(null)->columnSpanFull(),
            Toggle::make('is_active')->label('Aktif')->default(true)->required(),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('material_name')->label('Nama Material'),
            TextEntry::make('material_code')->label('Kode Material'),
            TextEntry::make('price_per_unit')->label('Harga per Satuan')->numeric(),
            TextEntry::make('stock_quantity')->label('Stok')->numeric(),
            TextEntry::make('unit')->label('Satuan'),
            TextEntry::make('minimum_stock')->label('Stok Minimum')->numeric(),
            TextEntry::make('supplier_name')->label('Supplier'),
            TextEntry::make('supplier_contact')->label('Kontak Supplier'),
            IconEntry::make('is_active')->label('Aktif')->boolean(),
            TextEntry::make('created_at')->label('Dibuat')->dateTime(),
            TextEntry::make('updated_at')->label('Diperbarui')->dateTime(),
            TextEntry::make('deleted_at')->label('Dihapus')->dateTime(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('material_name')->label('Nama Material')->searchable(),
            TextColumn::make('material_code')->label('Kode')->searchable(),
            TextColumn::make('price_per_unit')->label('Harga')->numeric()->sortable(),
            TextColumn::make('stock_quantity')->label('Stok')->numeric()->sortable(),
            TextColumn::make('unit')->label('Satuan'),
            TextColumn::make('minimum_stock')->label('Stok Minimum')->numeric()->sortable(),
            TextColumn::make('supplier_name')->label('Supplier')->searchable(),
            TextColumn::make('supplier_contact')->label('Kontak')->searchable(),
            IconColumn::make('is_active')->label('Aktif')->boolean(),
            TextColumn::make('created_at')->label('Dibuat')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')->label('Diperbarui')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('deleted_at')->label('Dihapus')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
        ])
        ->filters([
            TrashedFilter::make(),
        ])
        ->recordActions([
            ViewAction::make(),
            EditAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ])
        ->toolbarActions([
            BulkActionGroup::make([
                DeleteBulkAction::make(),
                ForceDeleteBulkAction::make(),
                RestoreBulkAction::make(),
            ]),
        ]);
    }

    public static function getPages(): array
    {
        return ['index' => ManageMaterials::route('/')];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
