<?php

namespace App\Filament\Resources\Products;

use App\Enums\Unit;
use App\Filament\Resources\Products\Pages\ManageProducts;
use App\Models\Product;
use App\Models\ProductCategory;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
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

    protected static ?int $navigationSort = 20;

    protected static ?string $recordTitleAttribute = 'product_name';

    protected static ?string $navigationLabel = 'Produk';

    protected static ?string $modelLabel = 'Produk';

    protected static ?string $pluralModelLabel = 'Produk';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('product_name')
                ->label('Nama Produk')
                ->required()
                ->maxLength(255)
                ->placeholder('Masukkan nama produk'),

            Select::make('category_id')
                ->label('Kategori Produk')
                ->relationship('category', 'category_name')
                ->searchable()
                ->preload()
                ->required()
                ->createOptionForm([
                    TextInput::make('category_name')
                        ->label('Nama Kategori')
                        ->required()
                        ->maxLength(255),
                    Textarea::make('description')
                        ->label('Deskripsi')
                        ->rows(2),
                    Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true),
                ]),

            TextInput::make('base_price')
                ->label('Harga Dasar (Rp)')
                ->required()
                ->numeric()
                ->minValue(0)
                ->prefix('Rp')
                ->default(0.0)
                ->placeholder('0'),

            Textarea::make('description')
                ->label('Deskripsi')
                ->rows(3)
                ->maxLength(1000)
                ->placeholder('Deskripsi produk (opsional)')
                ->nullable()
                ->columnSpanFull(),

            Select::make('unit')
                ->label('Satuan')
                ->options(Unit::options())
                ->default(Unit::PCS->value)
                ->required()
                ->native(false),

            Toggle::make('is_active')
                ->label('Aktif')
                ->default(true)
                ->required(),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('product_name')
                ->label('Nama Produk'),

            TextEntry::make('category.category_name')
                ->label('Kategori'),

            TextEntry::make('description')
                ->label('Deskripsi')
                ->placeholder('-'),

            TextEntry::make('base_price')
                ->label('Harga Dasar')
                ->money('IDR'),

            TextEntry::make('unit')
                ->label('Satuan')
                ->formatStateUsing(fn (string $state): string => Unit::from($state)->label()),

            IconEntry::make('is_active')
                ->label('Status Aktif')
                ->boolean(),

            TextEntry::make('created_at')
                ->label('Dibuat Pada')
                ->dateTime('d M Y H:i'),

            TextEntry::make('updated_at')
                ->label('Diperbarui Pada')
                ->dateTime('d M Y H:i'),

            TextEntry::make('deleted_at')
                ->label('Dihapus Pada')
                ->dateTime('d M Y H:i')
                ->placeholder('-'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('product_name')
                ->label('Nama Produk')
                ->searchable()
                ->sortable(),

            TextColumn::make('category.category_name')
                ->label('Kategori')
                ->sortable()
                ->searchable(),

            TextColumn::make('base_price')
                ->label('Harga Dasar')
                ->money('IDR')
                ->sortable(),

            TextColumn::make('unit')
                ->label('Satuan')
                ->formatStateUsing(fn (string $state): string => Unit::from($state)->label())
                ->sortable(),

            IconColumn::make('is_active')
                ->label('Aktif')
                ->boolean(),

            TextColumn::make('created_at')
                ->label('Dibuat Pada')
                ->dateTime('d M Y H:i')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('updated_at')
                ->label('Diperbarui Pada')
                ->dateTime('d M Y H:i')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('deleted_at')
                ->label('Dihapus Pada')
                ->dateTime('d M Y H:i')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->filters([
            SelectFilter::make('category_id')
                ->label('Kategori')
                ->relationship('category', 'category_name')
                ->searchable()
                ->preload()
                ->native(false),

            SelectFilter::make('unit')
                ->label('Satuan')
                ->options(Unit::options())
                ->native(false),

            TernaryFilter::make('is_active')
                ->label('Status Aktif')
                ->placeholder('Semua')
                ->trueLabel('Aktif')
                ->falseLabel('Tidak Aktif')
                ->native(false),

            TrashedFilter::make()
                ->label('Status'),
        ])
        ->defaultSort('created_at', 'desc')
        ->recordActions([
            ViewAction::make(),
            EditAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ])
        ->toolbarActions([
            CreateAction::make()
                ->label('Tambah Produk'),
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
