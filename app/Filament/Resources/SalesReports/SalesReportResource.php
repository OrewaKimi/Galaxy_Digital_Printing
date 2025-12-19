<?php

namespace App\Filament\Resources\SalesReports;

use App\Enums\ReportPeriod;
use App\Filament\Resources\SalesReports\Pages\ManageSalesReports;
use App\Models\SalesReport;
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

class SalesReportResource extends Resource
{
    protected static ?string $model = SalesReport::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;

    protected static string | UnitEnum | null $navigationGroup = 'Laporan';

    protected static ?int $navigationSort = 50;

    protected static ?string $navigationLabel = 'Laporan Penjualan';

    protected static ?string $modelLabel = 'Laporan Penjualan';

    protected static ?string $pluralModelLabel = 'Laporan Penjualan';

    protected static ?string $recordTitleAttribute = 'report_number';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('report_number')
                    ->label('Nomor Laporan')
                    ->required()
                    ->maxLength(50)
                    ->unique(ignoreRecord: true),
                
                DatePicker::make('report_date')
                    ->label('Tanggal Laporan')
                    ->required()
                    ->default(now())
                    ->native(false),
                
                DatePicker::make('period_start')
                    ->label('Periode Mulai')
                    ->required()
                    ->native(false),
                
                DatePicker::make('period_end')
                    ->label('Periode Selesai')
                    ->required()
                    ->native(false),
                
                Select::make('report_period')
                    ->label('Periode Laporan')
                    ->options(ReportPeriod::options())
                    ->required()
                    ->native(false),
                
                TextInput::make('total_sales')
                    ->label('Total Penjualan')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0)
                    ->default(0.0),
                
                TextInput::make('total_cost')
                    ->label('Total Biaya')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0)
                    ->default(0.0),
                
                TextInput::make('total_profit')
                    ->label('Total Profit')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->default(0.0),
                
                TextInput::make('total_discount')
                    ->label('Total Diskon')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0)
                    ->default(0.0),
                
                TextInput::make('total_tax')
                    ->label('Total Pajak')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0)
                    ->default(0.0),
                
                TextInput::make('total_orders')
                    ->label('Total Order')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0),
                
                TextInput::make('completed_orders')
                    ->label('Order Selesai')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0),
                
                TextInput::make('cancelled_orders')
                    ->label('Order Dibatalkan')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0),
                
                TextInput::make('pending_orders')
                    ->label('Order Pending')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0),
                
                TextInput::make('total_customers')
                    ->label('Total Customer')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0),
                
                TextInput::make('new_customers')
                    ->label('Customer Baru')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0),

                Select::make('generated_by')
                    ->label('Dibuat Oleh')
                    ->relationship('generator', 'full_name', fn (Builder $query) => 
                        $query->whereIn('role', ['admin', 'customer_service'])
                            ->whereNotNull('full_name')
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->full_name . ' (' . ($record->role_name ?? 'N/A') . ')')
                    ->searchable(['full_name', 'email'])
                    ->preload()
                    ->default(null),

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
        return $schema
            ->components([
                TextEntry::make('report_number')
                    ->label('Nomor Laporan'),
                TextEntry::make('report_date')
                    ->label('Tanggal')
                    ->date(),
                TextEntry::make('period_start')
                    ->label('Periode Mulai')
                    ->date(),
                TextEntry::make('period_end')
                    ->label('Periode Selesai')
                    ->date(),
                TextEntry::make('report_period')
                    ->label('Periode'),
                TextEntry::make('total_sales')
                    ->label('Total Penjualan')
                    ->money('IDR'),
                TextEntry::make('total_cost')
                    ->label('Total Biaya')
                    ->money('IDR'),
                TextEntry::make('total_profit')
                    ->label('Total Profit')
                    ->money('IDR'),
                TextEntry::make('total_orders')
                    ->label('Total Order')
                    ->numeric(),
                TextEntry::make('completed_orders')
                    ->label('Selesai')
                    ->numeric(),
                TextEntry::make('generator.full_name')
                    ->label('Dibuat Oleh'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('report_number')
                    ->label('No. Laporan')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-hashtag')
                    ->copyable()
                    ->copyMessage('Nomor laporan disalin'),
                TextColumn::make('report_date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('period_start')
                    ->label('Periode')
                    ->date('d M Y')
                    ->formatStateUsing(fn ($record) => $record->period_start->format('d M Y') . ' - ' . $record->period_end->format('d M Y'))
                    ->sortable(),
                TextColumn::make('report_period')
                    ->label('Tipe Periode')
                    ->formatStateUsing(fn (string $state): string => ReportPeriod::from($state)->label())
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'daily' => 'info',
                        'weekly' => 'success',
                        'monthly' => 'warning',
                        'quarterly' => 'primary',
                        'yearly' => 'danger',
                        'custom' => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('total_sales')
                    ->label('Penjualan')
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('total_profit')
                    ->label('Profit')
                    ->money('IDR')
                    ->sortable()
                    ->color(fn ($state) => $state >= 0 ? 'success' : 'danger'),
                TextColumn::make('total_orders')
                    ->label('Total Order')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('completed_orders')
                    ->label('Selesai')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('total_customers')
                    ->label('Customer')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('new_customers')
                    ->label('Baru')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('generator.full_name')
                    ->label('Dibuat Oleh')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(),
            ])
            ->defaultSort('report_date', 'desc')
            ->filters([
                SelectFilter::make('report_period')
                    ->label('Periode')
                    ->options(ReportPeriod::options())
                    ->native(false),
                SelectFilter::make('generated_by')
                    ->label('Dibuat Oleh')
                    ->relationship('generator', 'full_name', fn (Builder $query) => 
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
                    ->label('Tambah Laporan'),
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
            'index' => ManageSalesReports::route('/'),
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