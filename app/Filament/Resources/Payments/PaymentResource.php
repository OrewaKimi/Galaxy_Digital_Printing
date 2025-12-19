<?php

namespace App\Filament\Resources\Payments;

use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use App\Filament\Resources\Payments\Pages\ManagePayments;
use App\Models\Payment;
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
use Filament\Forms\Components\FileUpload;
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

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCreditCard;

    protected static string | UnitEnum | null $navigationGroup = 'Transaksi';

    protected static ?int $navigationSort = 12;

    protected static ?string $navigationLabel = 'Pembayaran';

    protected static ?string $modelLabel = 'Pembayaran';

    protected static ?string $pluralModelLabel = 'Pembayaran';

    protected static ?string $recordTitleAttribute = 'payment_number';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('payment_number')
                    ->label('Nomor Pembayaran')
                    ->required()
                    ->maxLength(50)
                    ->unique(ignoreRecord: true),
                
                Select::make('order_id')
                    ->label('Order')
                    ->relationship('order', 'order_number')
                    ->searchable()
                    ->preload()
                    ->required(),
                
                Select::make('payment_type_id')
                    ->label('Tipe Pembayaran')
                    ->relationship('paymentType', 'type_name')
                    ->searchable()
                    ->preload()
                    ->required(),
                
                TextInput::make('amount')
                    ->label('Jumlah')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0),
                
                TextInput::make('payment_percentage')
                    ->label('Persentase')
                    ->numeric()
                    ->suffix('%')
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(null)
                    ->helperText('Persentase pembayaran dari total order'),
                
                Select::make('payment_method')
                    ->label('Metode Pembayaran')
                    ->options(PaymentMethod::options())
                    ->default(PaymentMethod::CASH->value)
                    ->required()
                    ->native(false),
                
                Select::make('payment_status')
                    ->label('Status Pembayaran')
                    ->options(PaymentStatus::options())
                    ->default(PaymentStatus::PENDING->value)
                    ->required()
                    ->native(false),
                
                DateTimePicker::make('payment_date')
                    ->label('Tanggal Pembayaran')
                    ->required()
                    ->default(now())
                    ->native(false),
                
                TextInput::make('transaction_reference')
                    ->label('Referensi Transaksi')
                    ->maxLength(100)
                    ->default(null)
                    ->helperText('Nomor referensi dari bank atau payment gateway'),
                
                TextInput::make('bank_name')
                    ->label('Nama Bank')
                    ->maxLength(100)
                    ->default(null),
                
                TextInput::make('account_number')
                    ->label('Nomor Rekening')
                    ->maxLength(50)
                    ->default(null),
                
                TextInput::make('account_name')
                    ->label('Nama Rekening')
                    ->maxLength(100)
                    ->default(null),
                
                FileUpload::make('payment_proof')
                    ->label('Bukti Pembayaran')
                    ->disk('public')
                    ->directory('payment-proofs')
                    ->image()
                    ->maxSize(5120)
                    ->default(null)
                    ->columnSpanFull(),

                Select::make('received_by')
                    ->label('Diterima Oleh')
                    ->relationship('receiver', 'full_name', fn (Builder $query) => 
                        $query->whereIn('role', ['admin', 'customer_service'])
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->full_name . ' (' . $record->role_name . ')')
                    ->searchable(['full_name', 'email'])
                    ->preload()
                    ->default(null),

                Select::make('verified_by')
                    ->label('Diverifikasi Oleh')
                    ->relationship('verifier', 'full_name', fn (Builder $query) => 
                        $query->where('role', 'admin')
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->full_name . ' - Admin')
                    ->searchable(['full_name', 'email'])
                    ->preload()
                    ->default(null),

                DateTimePicker::make('verification_date')
                    ->label('Tanggal Verifikasi')
                    ->native(false),
                    
                Textarea::make('notes')
                    ->label('Catatan')
                    ->maxLength(65535)
                    ->rows(3)
                    ->default(null)
                    ->columnSpanFull(),
                    
                Textarea::make('rejection_reason')
                    ->label('Alasan Penolakan')
                    ->maxLength(65535)
                    ->rows(3)
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('payment_number')
                    ->label('No. Pembayaran'),
                TextEntry::make('order.order_number')
                    ->label('No. Order'),
                TextEntry::make('paymentType.type_name')
                    ->label('Tipe'),
                TextEntry::make('amount')
                    ->label('Jumlah')
                    ->money('IDR'),
                TextEntry::make('payment_method')
                    ->label('Metode'),
                TextEntry::make('payment_status')
                    ->label('Status'),
                TextEntry::make('payment_date')
                    ->label('Tanggal')
                    ->dateTime(),
                TextEntry::make('receiver.full_name')
                    ->label('Diterima Oleh'),
                TextEntry::make('verifier.full_name')
                    ->label('Diverifikasi Oleh'),
                TextEntry::make('verification_date')
                    ->label('Tgl Verifikasi')
                    ->dateTime(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('payment_number')
                    ->label('No. Pembayaran')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-hashtag')
                    ->copyable()
                    ->copyMessage('Nomor pembayaran disalin'),
                TextColumn::make('order.order_number')
                    ->label('No. Order')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-document-text'),
                TextColumn::make('paymentType.type_name')
                    ->label('Tipe')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('amount')
                    ->label('Jumlah')
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('payment_method')
                    ->label('Metode')
                    ->formatStateUsing(fn (string $state): string => PaymentMethod::from($state)->label())
                    ->badge()
                    ->color(fn (string $state): string => PaymentMethod::from($state)->getColor())
                    ->sortable(),
                TextColumn::make('payment_status')
                    ->label('Status')
                    ->formatStateUsing(fn (string $state): string => PaymentStatus::from($state)->label())
                    ->badge()
                    ->color(fn (string $state): string => PaymentStatus::from($state)->getColor())
                    ->sortable(),
                TextColumn::make('payment_date')
                    ->label('Tanggal')
                    ->dateTime('d M Y')
                    ->sortable(),
                TextColumn::make('receiver.full_name')
                    ->label('Diterima')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(),
                TextColumn::make('verifier.full_name')
                    ->label('Diverifikasi')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(),
            ])
            ->defaultSort('payment_date', 'desc')
            ->filters([
                Filter::make('payment_date')
                    ->form([
                        DatePicker::make('payment_from')
                            ->label('Dari Tanggal')
                            ->native(false),
                        DatePicker::make('payment_until')
                            ->label('Sampai Tanggal')
                            ->native(false),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['payment_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('payment_date', '>=', $date),
                            )
                            ->when(
                                $data['payment_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('payment_date', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['payment_from'] ?? null) {
                            $indicators[] = 'Pembayaran dari: ' . \Carbon\Carbon::parse($data['payment_from'])->format('d M Y');
                        }
                        if ($data['payment_until'] ?? null) {
                            $indicators[] = 'Pembayaran sampai: ' . \Carbon\Carbon::parse($data['payment_until'])->format('d M Y');
                        }
                        return $indicators;
                    }),

                SelectFilter::make('payment_status')
                    ->label('Status')
                    ->options(PaymentStatus::options())
                    ->native(false),
                SelectFilter::make('payment_method')
                    ->label('Metode')
                    ->options(PaymentMethod::options())
                    ->native(false),
                SelectFilter::make('order_id')
                    ->label('Order')
                    ->relationship('order', 'order_number')
                    ->searchable()
                    ->preload()
                    ->native(false),
                SelectFilter::make('payment_type_id')
                    ->label('Tipe Pembayaran')
                    ->relationship('paymentType', 'type_name')
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
                    ->label('Tambah Pembayaran'),
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
            'index' => ManagePayments::route('/'),
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