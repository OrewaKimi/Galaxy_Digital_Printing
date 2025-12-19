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

    protected static ?int $navigationSort = 22;

    protected static ?string $recordTitleAttribute = 'material_name';

    protected static ?string $navigationLabel = 'Material';

    protected static ?string $modelLabel = 'Material';

    protected static ?string $pluralModelLabel = 'Material';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('material_name')
                ->label('Nama Material')
                ->required()
                ->maxLength(255)
                ->placeholder('Masukkan nama material'),

            TextInput::make('material_code')
                ->label('Kode Material')
                ->maxLength(50)
                ->unique(ignoreRecord: true)
                ->placeholder('Kode unik material')
                ->nullable(),

            TextInput::make('price_per_unit')
                ->label('Harga per Satuan')
                ->required()
                ->numeric()
                ->minValue(0)
                ->prefix('Rp')
                ->placeholder('0'),

            TextInput::make('stock_quantity')
                ->label('Stok')
                ->required()
                ->numeric()
                ->minValue(0)
                ->default(0.0)
                ->suffix(fn ($get) => $get('unit') ? \App\Enums\Unit::from($get('unit'))->label() : ''),

            Select::make('unit')
                ->label('Satuan')
                ->options(\App\Enums\Unit::options())
                ->default(\App\Enums\Unit::M2->value)
                ->required()
                ->native(false)
                ->live(),

            TextInput::make('minimum_stock')
                ->label('Stok Minimum')
                ->required()
                ->numeric()
                ->minValue(0)
                ->default(0.0)
                ->helperText('Akan muncul notifikasi jika stok di bawah nilai ini'),

            TextInput::make('supplier_name')
                ->label('Nama Supplier')
                ->maxLength(255)
                ->placeholder('Opsional')
                ->nullable(),

            TextInput::make('supplier_contact')
                ->label('Kontak Supplier')
                ->tel()
                ->maxLength(50)
                ->placeholder('Nomor telepon supplier')
                ->nullable(),

            Textarea::make('supplier_address')
                ->label('Alamat Supplier')
                ->rows(2)
                ->maxLength(500)
                ->placeholder('Alamat lengkap supplier')
                ->nullable()
                ->columnSpanFull(),

            Toggle::make('is_active')
                ->label('Aktif')
                ->default(true)
                ->required(),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('material_name')
                ->label('Nama Material'),

            TextEntry::make('material_code')
                ->label('Kode Material')
                ->placeholder('-'),

            TextEntry::make('price_per_unit')
                ->label('Harga per Satuan')
                ->money('IDR'),

            TextEntry::make('stock_quantity')
                ->label('Stok')
                ->numeric(decimalPlaces: 2)
                ->suffix(fn ($record) => ' ' . \App\Enums\Unit::from($record->unit)->label())
                ->color(fn ($record) => $record->stock_quantity <= $record->minimum_stock ? 'danger' : 'success'),

            TextEntry::make('unit')
                ->label('Satuan')
                ->formatStateUsing(fn (string $state): string => \App\Enums\Unit::from($state)->label()),

            TextEntry::make('minimum_stock')
                ->label('Stok Minimum')
                ->numeric(decimalPlaces: 2),

            TextEntry::make('supplier_name')
                ->label('Supplier')
                ->placeholder('-'),

            TextEntry::make('supplier_contact')
                ->label('Kontak Supplier')
                ->placeholder('-'),

            TextEntry::make('supplier_address')
                ->label('Alamat Supplier')
                ->placeholder('-'),

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
            TextColumn::make('material_name')
                ->label('Nama Material')
                ->searchable()
                ->sortable(),

            TextColumn::make('material_code')
                ->label('Kode')
                ->searchable()
                ->sortable()
                ->placeholder('-')
                ->toggleable(),

            TextColumn::make('stock_quantity')
                ->label('Stok')
                ->numeric(decimalPlaces: 2)
                ->sortable()
                ->suffix(fn ($record) => ' ' . \App\Enums\Unit::from($record->unit)->label())
                ->color(fn ($record) => $record->stock_quantity <= $record->minimum_stock ? 'danger' : 'success')
                ->description(fn ($record) => 
                    $record->stock_quantity <= $record->minimum_stock 
                        ? '⚠️ Stok rendah' 
                        : '✓ Stok cukup'
                ),

            TextColumn::make('price_per_unit')
                ->label('Harga')
                ->money('IDR')
                ->sortable(),

            TextColumn::make('unit')
                ->label('Satuan')
                ->formatStateUsing(fn (string $state): string => \App\Enums\Unit::from($state)->label())
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('minimum_stock')
                ->label('Stok Min')
                ->numeric(decimalPlaces: 2)
                ->sortable()
                ->toggleable(),

            TextColumn::make('supplier_name')
                ->label('Supplier')
                ->searchable()
                ->placeholder('-')
                ->toggleable(),

            TextColumn::make('supplier_contact')
                ->label('Kontak')
                ->searchable()
                ->placeholder('-')
                ->toggleable(isToggledHiddenByDefault: true),

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
            \Filament\Tables\Filters\SelectFilter::make('unit')
                ->label('Satuan')
                ->options(\App\Enums\Unit::options())
                ->native(false),

            \Filament\Tables\Filters\TernaryFilter::make('low_stock')
                ->label('Stok Rendah')
                ->placeholder('Semua')
                ->trueLabel('Stok di bawah minimum')
                ->falseLabel('Stok cukup')
                ->queries(
                    true: fn (Builder $query) => $query->whereColumn('stock_quantity', '<=', 'minimum_stock'),
                    false: fn (Builder $query) => $query->whereColumn('stock_quantity', '>', 'minimum_stock'),
                )
                ->native(false),

            \Filament\Tables\Filters\TernaryFilter::make('is_active')
                ->label('Status Aktif')
                ->placeholder('Semua')
                ->trueLabel('Aktif')
                ->falseLabel('Tidak Aktif')
                ->native(false),

            TrashedFilter::make()
                ->label('Status'),
        ])
        ->defaultSort('material_name', 'asc')
        ->recordActions([
            ViewAction::make(),
            EditAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ])
        ->toolbarActions([
            \Filament\Actions\CreateAction::make()
                ->label('Tambah Material'),
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
