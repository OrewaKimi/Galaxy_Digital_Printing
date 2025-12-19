<?php

namespace App\Filament\Resources\Orders;

use App\Filament\Resources\Orders\Pages\ManageOrders;
use App\Models\Order;
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
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck;

    protected static string | UnitEnum | null $navigationGroup = 'Transaksi';

    protected static ?int $navigationSort = 10;

    protected static ?string $navigationLabel = 'Order';

    protected static ?string $modelLabel = 'Order';

    protected static ?string $pluralModelLabel = 'Order';

    protected static ?string $recordTitleAttribute = 'order_number';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order_number')
                    ->label('Nomor Order')
                    ->required()
                    ->maxLength(50)
                    ->unique(ignoreRecord: true),
                
                Select::make('customer_id')
                    ->label('Customer')
                    ->relationship('customer', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionForm([
                        Select::make('user_id')
                            ->label('User')
                            ->relationship('user', 'full_name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(100),
                    ]),
                
                Select::make('status_id')
                    ->label('Status')
                    ->relationship('status', 'status_name')
                    ->searchable()
                    ->preload()
                    ->required(),
                
                DateTimePicker::make('order_date')
                    ->label('Tanggal Order')
                    ->required()
                    ->default(now())
                    ->native(false),
                
                DatePicker::make('deadline')
                    ->label('Deadline')
                    ->native(false),
                
                DatePicker::make('completed_date')
                    ->label('Tanggal Selesai')
                    ->native(false),
                
                TextInput::make('subtotal')
                    ->label('Subtotal')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0)
                    ->default(0.0),
                
                TextInput::make('discount_amount')
                    ->label('Diskon (Rp)')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0)
                    ->default(0.0)
                    ->helperText('Masukkan diskon dalam Rupiah atau gunakan persentase di bawah'),
                
                TextInput::make('discount_percentage')
                    ->label('Diskon (%)')
                    ->required()
                    ->numeric()
                    ->suffix('%')
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(0.0)
                    ->helperText('Persentase diskon dari subtotal'),
                
                TextInput::make('tax_amount')
                    ->label('Pajak (Rp)')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0)
                    ->default(0.0),
                
                TextInput::make('tax_percentage')
                    ->label('Pajak (%)')
                    ->required()
                    ->numeric()
                    ->suffix('%')
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(0.0),
                
                TextInput::make('total_price')
                    ->label('Total Harga')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0)
                    ->default(0.0),
                
                TextInput::make('paid_amount')
                    ->label('Jumlah Dibayar')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0)
                    ->default(0.0),
                
                TextInput::make('remaining_amount')
                    ->label('Sisa Pembayaran')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0)
                    ->default(0.0),
                
                Textarea::make('notes')
                    ->label('Catatan')
                    ->maxLength(65535)
                    ->rows(3)
                    ->default(null)
                    ->columnSpanFull(),
                
                Textarea::make('customer_notes')
                    ->label('Catatan Customer')
                    ->maxLength(65535)
                    ->rows(3)
                    ->default(null)
                    ->columnSpanFull(),

                Select::make('assigned_designer')
                    ->label('Designer Ditugaskan')
                    ->relationship('designer', 'full_name', fn (Builder $query) => 
                        $query->where(function ($q) {
                            $q->where('role', 'designer')->orWhere('role', 'admin');
                        })->whereNotNull('full_name')
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => 
                        $record->full_name . ' - ' . $record->email
                    )
                    ->searchable(['full_name', 'email'])
                    ->preload()
                    ->default(null),

                Select::make('assigned_production')
                    ->label('Production Ditugaskan')
                    ->relationship('production', 'full_name', fn (Builder $query) => 
                        $query->where(function ($q) {
                            $q->where('role', 'production')->orWhere('role', 'admin');
                        })->whereNotNull('full_name')
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => 
                        $record->full_name . ' - ' . $record->email
                    )
                    ->searchable(['full_name', 'email'])
                    ->preload()
                    ->default(null),

                Select::make('created_by')
                    ->label('Dibuat Oleh')
                    ->relationship('creator', 'full_name', fn (Builder $query) => 
                        $query->whereNotNull('full_name')
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->full_name . ' (' . ($record->role_name ?? 'N/A') . ')')
                    ->searchable(['full_name', 'email'])
                    ->preload()
                    ->default(null),

                Select::make('updated_by')
                    ->label('Diperbarui Oleh')
                    ->relationship('updater', 'full_name', fn (Builder $query) => 
                        $query->whereNotNull('full_name')
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->full_name . ' (' . ($record->role_name ?? 'N/A') . ')')
                    ->searchable(['full_name', 'email'])
                    ->preload()
                    ->default(null),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('order_number')
                    ->label('Nomor Order'),
                TextEntry::make('customer.name')
                    ->label('Customer'),
                TextEntry::make('status.status_name')
                    ->label('Status'),
                TextEntry::make('order_date')
                    ->label('Tanggal Order')
                    ->dateTime(),
                TextEntry::make('deadline')
                    ->label('Deadline')
                    ->date(),
                TextEntry::make('total_price')
                    ->label('Total')
                    ->money('IDR'),
                TextEntry::make('designer.full_name')
                    ->label('Designer'),
                TextEntry::make('production.full_name')
                    ->label('Production'),
                TextEntry::make('creator.full_name')
                    ->label('Dibuat Oleh'),
                TextEntry::make('updater.full_name')
                    ->label('Diperbarui Oleh'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')
                    ->label('No. Order')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-hashtag')
                    ->copyable()
                    ->copyMessage('Nomor order disalin'),
                TextColumn::make('customer.name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status.status_name')
                    ->label('Status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('order_date')
                    ->label('Tgl Order')
                    ->dateTime('d M Y')
                    ->sortable(),
                TextColumn::make('deadline')
                    ->label('Deadline')
                    ->date('d M Y')
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('total_price')
                    ->label('Total')
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('remaining_amount')
                    ->label('Sisa')
                    ->money('IDR')
                    ->sortable()
                    ->color(fn ($state) => $state > 0 ? 'warning' : 'success')
                    ->toggleable(),
                TextColumn::make('designer.full_name')
                    ->label('Designer')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(),
                TextColumn::make('production.full_name')
                    ->label('Production')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(),
                TextColumn::make('creator.full_name')
                    ->label('Dibuat Oleh')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order_date', 'desc')
            ->filters([
                Filter::make('order_date')
                    ->form([
                        DatePicker::make('order_from')
                            ->label('Dari Tanggal')
                            ->native(false),
                        DatePicker::make('order_until')
                            ->label('Sampai Tanggal')
                            ->native(false),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['order_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('order_date', '>=', $date),
                            )
                            ->when(
                                $data['order_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('order_date', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['order_from'] ?? null) {
                            $indicators[] = 'Order dari: ' . \Carbon\Carbon::parse($data['order_from'])->format('d M Y');
                        }
                        if ($data['order_until'] ?? null) {
                            $indicators[] = 'Order sampai: ' . \Carbon\Carbon::parse($data['order_until'])->format('d M Y');
                        }
                        return $indicators;
                    }),

                SelectFilter::make('status_id')
                    ->label('Status')
                    ->relationship('status', 'status_name')
                    ->preload()
                    ->native(false),
                SelectFilter::make('customer_id')
                    ->label('Customer')
                    ->relationship('customer', 'name')
                    ->searchable()
                    ->preload()
                    ->native(false),
                SelectFilter::make('assigned_designer')
                    ->label('Designer')
                    ->relationship('designer', 'full_name', fn (Builder $query) => 
                        $query->whereNotNull('full_name')
                    )
                    ->searchable()
                    ->preload()
                    ->native(false),
                SelectFilter::make('assigned_production')
                    ->label('Production')
                    ->relationship('production', 'full_name', fn (Builder $query) => 
                        $query->whereNotNull('full_name')
                    )
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
                    ->label('Tambah Order'),
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
            'index' => ManageOrders::route('/'),
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