<?php

namespace App\Filament\Resources\ProductionProgress;

use App\Enums\ProductionStatus;
use App\Filament\Resources\ProductionProgress\Pages\ManageProductionProgress;
use App\Models\ProductionProgress;
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

class ProductionProgressResource extends Resource
{
    protected static ?string $model = ProductionProgress::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowTrendingUp;

    protected static string | UnitEnum | null $navigationGroup = 'Produksi';

    protected static ?int $navigationSort = 41;

    protected static ?string $navigationLabel = 'Progress Produksi';

    protected static ?string $modelLabel = 'Progress Produksi';

    protected static ?string $pluralModelLabel = 'Progress Produksi';
    
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('order_id')
                    ->label('Order')
                    ->relationship('order', 'order_number')
                    ->searchable()
                    ->preload()
                    ->required(),
                
                Select::make('item_id')
                    ->label('Item Order')
                    ->relationship('item', 'id')
                    ->searchable()
                    ->preload()
                    ->default(null),
                
                Select::make('stage_id')
                    ->label('Tahap Produksi')
                    ->relationship('stage', 'stage_name')
                    ->searchable()
                    ->preload()
                    ->required(),
                
                Select::make('status')
                    ->label('Status')
                    ->options(ProductionStatus::options())
                    ->default(ProductionStatus::NOT_STARTED->value)
                    ->required()
                    ->native(false),
                
                DateTimePicker::make('started_at')
                    ->label('Mulai Pada')
                    ->native(false),
                
                DateTimePicker::make('completed_at')
                    ->label('Selesai Pada')
                    ->native(false),
                
                DateTimePicker::make('paused_at')
                    ->label('Dijeda Pada')
                    ->native(false),
                
                TextInput::make('duration')
                    ->label('Durasi (menit)')
                    ->numeric()
                    ->suffix('menit')
                    ->minValue(0)
                    ->default(null),

                Select::make('handled_by')
                    ->label('Ditangani Oleh')
                    ->relationship('handler', 'full_name', fn (Builder $query) => 
                        $query->whereIn('role', ['production', 'designer', 'admin'])
                            ->whereNotNull('full_name')
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->full_name . ' (' . ($record->role_name ?? 'N/A') . ')')
                    ->searchable(['full_name', 'email'])
                    ->preload()
                    ->default(null),

                TextInput::make('progress_percentage')
                    ->label('Persentase Progress')
                    ->required()
                    ->numeric()
                    ->suffix('%')
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(0),
                    
                Textarea::make('notes')
                    ->label('Catatan')
                    ->maxLength(65535)
                    ->rows(3)
                    ->default(null)
                    ->columnSpanFull(),
                    
                Textarea::make('issues')
                    ->label('Masalah')
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
                TextEntry::make('order.order_number')
                    ->label('No. Order'),
                TextEntry::make('stage.stage_name')
                    ->label('Tahapan'),
                TextEntry::make('status')
                    ->label('Status'),
                TextEntry::make('started_at')
                    ->label('Mulai')
                    ->dateTime(),
                TextEntry::make('completed_at')
                    ->label('Selesai')
                    ->dateTime(),
                TextEntry::make('duration')
                    ->label('Durasi')
                    ->suffix(' menit'),
                TextEntry::make('handler.full_name')
                    ->label('Ditangani Oleh'),
                TextEntry::make('progress_percentage')
                    ->label('Progress')
                    ->suffix('%'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order.order_number')
                    ->label('No. Order')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-document-text'),
                TextColumn::make('stage.stage_name')
                    ->label('Tahapan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn (string $state): string => ProductionStatus::from($state)->label())
                    ->badge()
                    ->color(fn (string $state): string => ProductionStatus::from($state)->getColor())
                    ->sortable(),
                TextColumn::make('progress_percentage')
                    ->label('Progress')
                    ->suffix('%')
                    ->sortable()
                    ->color(fn ($state) => $state >= 100 ? 'success' : ($state >= 50 ? 'warning' : 'danger')),
                TextColumn::make('handler.full_name')
                    ->label('Ditangani Oleh')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('started_at')
                    ->label('Mulai')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(),
                TextColumn::make('completed_at')
                    ->label('Selesai')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(),
                TextColumn::make('duration')
                    ->label('Durasi')
                    ->suffix(' mnt')
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(),
            ])
            ->defaultSort('started_at', 'desc')
            ->filters([
                Filter::make('started_at')
                    ->form([
                        DatePicker::make('started_from')
                            ->label('Mulai Dari')
                            ->native(false),
                        DatePicker::make('started_until')
                            ->label('Mulai Sampai')
                            ->native(false),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['started_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('started_at', '>=', $date),
                            )
                            ->when(
                                $data['started_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('started_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['started_from'] ?? null) {
                            $indicators[] = 'Mulai dari: ' . \Carbon\Carbon::parse($data['started_from'])->format('d M Y');
                        }
                        if ($data['started_until'] ?? null) {
                            $indicators[] = 'Mulai sampai: ' . \Carbon\Carbon::parse($data['started_until'])->format('d M Y');
                        }
                        return $indicators;
                    }),

                SelectFilter::make('status')
                    ->label('Status')
                    ->options(ProductionStatus::options())
                    ->native(false),
                SelectFilter::make('stage_id')
                    ->label('Tahap Produksi')
                    ->relationship('stage', 'stage_name')
                    ->searchable()
                    ->preload()
                    ->native(false),
                SelectFilter::make('order_id')
                    ->label('Order')
                    ->relationship('order', 'order_number')
                    ->searchable()
                    ->preload()
                    ->native(false),
                SelectFilter::make('handled_by')
                    ->label('Ditangani Oleh')
                    ->relationship('handler', 'full_name', fn (Builder $query) => 
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
                    ->label('Tambah Progress'),
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
            'index' => ManageProductionProgress::route('/'),
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