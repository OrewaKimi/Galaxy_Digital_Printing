<?php

namespace App\Filament\Resources\InventoryTransactions;

use App\Enums\TransactionType;
use App\Filament\Resources\InventoryTransactions\Pages\ManageInventoryTransactions;
use App\Models\InventoryTransaction;
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
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class InventoryTransactionResource extends Resource
{
    protected static ?string $model = InventoryTransaction::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowPath;

    protected static string | UnitEnum | null $navigationGroup = 'Transaksi';

    protected static ?int $navigationSort = 13;

    protected static ?string $navigationLabel = 'Transaksi Inventori';

    protected static ?string $modelLabel = 'Transaksi Inventori';

    protected static ?string $pluralModelLabel = 'Transaksi Inventori';

    protected static ?string $recordTitleAttribute = 'transaction_number';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('transaction_number')
                    ->label('Nomor Transaksi')
                    ->required()
                    ->maxLength(50)
                    ->unique(ignoreRecord: true),
                
                Select::make('material_id')
                    ->label('Material')
                    ->relationship('material', 'material_name')
                    ->searchable()
                    ->preload()
                    ->required(),
                
                Select::make('transaction_type')
                    ->label('Tipe Transaksi')
                    ->options(TransactionType::options())
                    ->default(TransactionType::OUT->value)
                    ->required()
                    ->native(false),
                
                TextInput::make('quantity')
                    ->label('Jumlah')
                    ->required()
                    ->numeric()
                    ->minValue(0.01),
                
                TextInput::make('price_per_unit')
                    ->label('Harga per Satuan')
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0)
                    ->default(null),
                
                TextInput::make('total_cost')
                    ->label('Total Biaya')
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0)
                    ->default(null),
                
                TextInput::make('stock_before')
                    ->label('Stok Sebelum')
                    ->numeric()
                    ->minValue(0)
                    ->default(null),
                
                TextInput::make('stock_after')
                    ->label('Stok Sesudah')
                    ->numeric()
                    ->minValue(0)
                    ->default(null),
                
                Select::make('order_id')
                    ->label('Order')
                    ->relationship('order', 'order_number')
                    ->searchable()
                    ->preload()
                    ->default(null),
                
                Select::make('item_id')
                    ->label('Item Order')
                    ->relationship('item', 'id')
                    ->searchable()
                    ->preload()
                    ->default(null),
                
                DateTimePicker::make('transaction_date')
                    ->label('Tanggal Transaksi')
                    ->required()
                    ->default(now())
                    ->native(false),
                
                TextInput::make('reference_number')
                    ->label('Nomor Referensi')
                    ->maxLength(100)
                    ->default(null)
                    ->helperText('Nomor referensi eksternal (PO, DO, dll)'),
                
                TextInput::make('supplier_invoice')
                    ->label('Invoice Supplier')
                    ->maxLength(100)
                    ->default(null),
                
                Textarea::make('notes')
                    ->label('Catatan')
                    ->maxLength(65535)
                    ->rows(3)
                    ->default(null)
                    ->columnSpanFull(),

                // HANDLED BY
                Select::make('handled_by')
                    ->label('Ditangani Oleh')
                    ->relationship('handler', 'full_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->full_name . ' (' . $record->role_name . ')')
                    ->searchable(['full_name', 'email', 'username'])
                    ->preload()
                    ->default(null),

                // APPROVED BY
                Select::make('approved_by')
                    ->label('Disetujui Oleh')
                    ->relationship('approver', 'full_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->full_name . ' (' . $record->role_name . ')')
                    ->searchable(['full_name', 'email', 'username'])
                    ->preload()
                    ->default(null),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('transaction_number')
                    ->label('Nomor Transaksi'),
                TextEntry::make('material.material_name')
                    ->label('Material'),
                TextEntry::make('transaction_type')
                    ->label('Tipe'),
                TextEntry::make('quantity')
                    ->label('Jumlah')
                    ->numeric(),
                TextEntry::make('price_per_unit')
                    ->label('Harga/Unit')
                    ->numeric(),
                TextEntry::make('total_cost')
                    ->label('Total')
                    ->numeric(),
                TextEntry::make('stock_before')
                    ->label('Stok Sebelum')
                    ->numeric(),
                TextEntry::make('stock_after')
                    ->label('Stok Sesudah')
                    ->numeric(),
                TextEntry::make('transaction_date')
                    ->label('Tanggal')
                    ->dateTime(),
                TextEntry::make('handler.full_name')
                    ->label('Ditangani Oleh'),
                TextEntry::make('approver.full_name')
                    ->label('Disetujui Oleh'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('transaction_number')
                    ->label('No. Transaksi')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-hashtag')
                    ->copyable()
                    ->copyMessage('Nomor transaksi disalin'),
                TextColumn::make('material.material_name')
                    ->label('Material')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                TextColumn::make('transaction_type')
                    ->label('Tipe')
                    ->formatStateUsing(fn (string $state): string => TransactionType::from($state)->label())
                    ->badge()
                    ->color(fn (string $state): string => TransactionType::from($state)->getColor())
                    ->sortable(),
                TextColumn::make('quantity')
                    ->label('Jumlah')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('total_cost')
                    ->label('Total')
                    ->money('IDR')
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('stock_after')
                    ->label('Stok Akhir')
                    ->numeric()
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('transaction_date')
                    ->label('Tanggal')
                    ->dateTime('d M Y')
                    ->sortable(),
                TextColumn::make('handler.full_name')
                    ->label('Ditangani')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(),
                TextColumn::make('approver.full_name')
                    ->label('Disetujui')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(),
            ])
            ->defaultSort('transaction_date', 'desc')
            ->filters([
                Filter::make('transaction_date')
                    ->form([
                        DatePicker::make('transaction_from')
                            ->label('Dari Tanggal')
                            ->native(false),
                        DatePicker::make('transaction_until')
                            ->label('Sampai Tanggal')
                            ->native(false),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['transaction_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('transaction_date', '>=', $date),
                            )
                            ->when(
                                $data['transaction_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('transaction_date', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['transaction_from'] ?? null) {
                            $indicators[] = 'Transaksi dari: ' . \Carbon\Carbon::parse($data['transaction_from'])->format('d M Y');
                        }
                        if ($data['transaction_until'] ?? null) {
                            $indicators[] = 'Transaksi sampai: ' . \Carbon\Carbon::parse($data['transaction_until'])->format('d M Y');
                        }
                        return $indicators;
                    }),

                SelectFilter::make('transaction_type')
                    ->label('Tipe Transaksi')
                    ->options(TransactionType::options())
                    ->native(false),
                SelectFilter::make('material_id')
                    ->label('Material')
                    ->relationship('material', 'material_name')
                    ->searchable()
                    ->preload()
                    ->native(false),
                SelectFilter::make('order_id')
                    ->label('Order')
                    ->relationship('order', 'order_number')
                    ->searchable()
                    ->preload()
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
                    ->label('Tambah Transaksi'),
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
            'index' => ManageInventoryTransactions::route('/'),
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