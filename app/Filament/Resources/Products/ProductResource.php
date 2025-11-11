<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\Pages\ManageProducts;
use App\Models\Product;
use App\Models\ProductCategory;
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

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingBag;

    protected static string | UnitEnum | null $navigationGroup = 'Produk & Material';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('product_name')
                ->label('Nama Produk')
                ->required(),

            Select::make('category_id')
                ->label('Kategori Produk')
                ->relationship('category', 'category_name')
                ->searchable()
                ->preload()
                ->required(),

            TextInput::make('base_price')
                ->label('Harga Dasar (Rp)')
                ->required()
                ->numeric()
                ->default(0.0),

            Textarea::make('description')
                ->label('Deskripsi')
                ->default(null)
                ->columnSpanFull(),

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
                ->default('pcs')
                ->required()
                ->searchable(),

            Toggle::make('is_active')
                ->label('Aktif')
                ->default(true)
                ->required(),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('product_name')->label('Nama Produk'),
            TextEntry::make('category.category_name')->label('Kategori'),
            TextEntry::make('base_price')->label('Harga Dasar')->numeric(),
            TextEntry::make('unit')->label('Satuan'),
            IconEntry::make('is_active')->label('Aktif')->boolean(),
            TextEntry::make('created_at')->label('Dibuat')->dateTime(),
            TextEntry::make('updated_at')->label('Diperbarui')->dateTime(),
            TextEntry::make('deleted_at')->label('Dihapus')->dateTime(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('product_name')->label('Nama Produk')->searchable(),
            TextColumn::make('category.category_name')->label('Kategori')->sortable()->searchable(),
            TextColumn::make('base_price')->label('Harga Dasar')->numeric()->sortable(),
            TextColumn::make('unit')->label('Satuan')->searchable(),
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
        return [
            'index' => ManageProducts::route('/'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
