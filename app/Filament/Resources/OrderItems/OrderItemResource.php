<?php

namespace App\Filament\Resources\OrderItems;

use App\Enums\Unit;
use App\Filament\Resources\OrderItems\Pages\ManageOrderItems;
use App\Models\OrderItem;
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
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class OrderItemResource extends Resource
{
    protected static ?string $model = OrderItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingCart;

    protected static string | UnitEnum | null $navigationGroup = 'Transaksi';

    protected static ?int $navigationSort = 11;

    protected static ?string $navigationLabel = 'Item Order';

    protected static ?string $modelLabel = 'Item Order';

    protected static ?string $pluralModelLabel = 'Item Order';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('order_id')
                ->label('Order')
                ->relationship('order', 'order_number')
                ->searchable()
                ->preload()
                ->required(),
            
            Select::make('product_id')
                ->label('Produk')
                ->relationship('product', 'product_name')
                ->getOptionLabelFromRecordUsing(fn ($record) => 
                    "{$record->product_name} - Rp " . number_format($record->base_price, 0, ',', '.')
                )
                ->searchable()
                ->preload()
                ->required(),
            
            Select::make('material_id')
                ->label('Material')
                ->relationship('material', 'material_name')
                ->searchable()
                ->preload()
                ->default(null),
            
            TextInput::make('width')
                ->label('Lebar')
                ->numeric()
                ->suffix('cm')
                ->minValue(0)
                ->default(null),
            
            TextInput::make('height')
                ->label('Tinggi')
                ->numeric()
                ->suffix('cm')
                ->minValue(0)
                ->default(null),
            
            TextInput::make('area')
                ->label('Luas')
                ->numeric()
                ->suffix('m²')
                ->minValue(0)
                ->default(null)
                ->helperText('Luas otomatis: lebar × tinggi ÷ 10000'),
            
            TextInput::make('quantity')
                ->label('Jumlah')
                ->required()
                ->numeric()
                ->minValue(1)
                ->default(1),

            Select::make('unit')
                ->label('Satuan')
                ->options(Unit::options())
                ->default(Unit::PCS->value)
                ->required()
                ->native(false),

            TextInput::make('unit_price')
                ->label('Harga Satuan')
                ->required()
                ->numeric()
                ->prefix('Rp')
                ->minValue(0),
            
            TextInput::make('material_cost')
                ->label('Biaya Material')
                ->required()
                ->numeric()
                ->prefix('Rp')
                ->minValue(0)
                ->default(0.0),
            
            TextInput::make('production_cost')
                ->label('Biaya Produksi')
                ->required()
                ->numeric()
                ->prefix('Rp')
                ->minValue(0)
                ->default(0.0),
            
            TextInput::make('subtotal')
                ->label('Subtotal')
                ->required()
                ->numeric()
                ->prefix('Rp')
                ->minValue(0),
            
            Textarea::make('specifications')
                ->label('Spesifikasi')
                ->maxLength(65535)
                ->rows(3)
                ->default(null)
                ->columnSpanFull(),
            
            Textarea::make('notes')
                ->label('Catatan')
                ->maxLength(65535)
                ->rows(3)
                ->default(null)
                ->columnSpanFull(),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('order.order_number')
                ->label('Nomor Order'),

            TextEntry::make('product.product_name')
                ->label('Produk'),

            TextEntry::make('material.material_name')
                ->label('Material')
                ->placeholder('-'),

            TextEntry::make('width')
                ->label('Lebar')
                ->numeric()
                ->suffix(' cm')
                ->placeholder('-'),

            TextEntry::make('height')
                ->label('Tinggi')
                ->numeric()
                ->suffix(' cm')
                ->placeholder('-'),

            TextEntry::make('area')
                ->label('Luas')
                ->numeric()
                ->suffix(' m²')
                ->placeholder('-'),

            TextEntry::make('quantity')
                ->label('Jumlah')
                ->numeric(),

            TextEntry::make('unit')
                ->label('Satuan')
                ->formatStateUsing(fn (string $state): string => Unit::from($state)->label()),

            TextEntry::make('unit_price')
                ->label('Harga Satuan')
                ->money('IDR'),

            TextEntry::make('material_cost')
                ->label('Biaya Material')
                ->money('IDR'),

            TextEntry::make('production_cost')
                ->label('Biaya Produksi')
                ->money('IDR'),

            TextEntry::make('subtotal')
                ->label('Subtotal')
                ->money('IDR'),

            TextEntry::make('specifications')
                ->label('Spesifikasi')
                ->placeholder('-'),

            TextEntry::make('notes')
                ->label('Catatan')
                ->placeholder('-'),

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
            TextColumn::make('order.order_number')
                ->label('No. Order')
                ->searchable()
                ->sortable()
                ->icon('heroicon-o-document-text'),
            TextColumn::make('product.product_name')
                ->label('Produk')
                ->searchable()
                ->sortable()
                ->limit(30),
            TextColumn::make('material.material_name')
                ->label('Material')
                ->searchable()
                ->sortable()
                ->placeholder('-')
                ->toggleable(),
            TextColumn::make('quantity')
                ->label('Jumlah')
                ->numeric()
                ->sortable(),
            TextColumn::make('unit')
                ->label('Satuan')
                ->formatStateUsing(fn (string $state): string => Unit::from($state)->label())
                ->sortable(),
            TextColumn::make('width')
                ->label('Lebar')
                ->numeric()
                ->suffix(' cm')
                ->sortable()
                ->placeholder('-')
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('height')
                ->label('Tinggi')
                ->numeric()
                ->suffix(' cm')
                ->sortable()
                ->placeholder('-')
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('area')
                ->label('Luas')
                ->numeric()
                ->suffix(' m²')
                ->sortable()
                ->placeholder('-')
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('unit_price')
                ->label('Harga Satuan')
                ->money('IDR')
                ->sortable(),
            TextColumn::make('subtotal')
                ->label('Subtotal')
                ->money('IDR')
                ->sortable(),
            TextColumn::make('material_cost')
                ->label('Biaya Material')
                ->money('IDR')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('production_cost')
                ->label('Biaya Produksi')
                ->money('IDR')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('created_at')
                ->label('Dibuat')
                ->dateTime('d M Y H:i')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->defaultSort('created_at', 'desc')
        ->filters([
            SelectFilter::make('order_id')
                ->label('Order')
                ->relationship('order', 'order_number')
                ->searchable()
                ->preload(),
            SelectFilter::make('product_id')
                ->label('Produk')
                ->relationship('product', 'product_name')
                ->searchable()
                ->preload(),
            SelectFilter::make('material_id')
                ->label('Material')
                ->relationship('material', 'material_name')
                ->searchable()
                ->preload(),
            SelectFilter::make('unit')
                ->label('Satuan')
                ->options(Unit::options())
                ->native(false),
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
            CreateAction::make()
                ->label('Tambah Item Order'),
            BulkActionGroup::make([
                DeleteBulkAction::make(),
                ForceDeleteBulkAction::make(),
                RestoreBulkAction::make(),
            ]),
        ]);
    }

    public static function getPages(): array
    {
        return ['index' => ManageOrderItems::route('/')];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
