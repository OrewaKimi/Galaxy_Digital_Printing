<?php

namespace App\Filament\Resources\ProductionStages;

use App\Filament\Resources\ProductionStages\Pages\ManageProductionStages;
use App\Models\ProductionStage;
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
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class ProductionStageResource extends Resource
{
    protected static ?string $model = ProductionStage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedQueueList;

    protected static string | UnitEnum | null $navigationGroup = 'Produksi';

    protected static ?int $navigationSort = 40;

    protected static ?string $navigationLabel = 'Tahap Produksi';

    protected static ?string $modelLabel = 'Tahap Produksi';

    protected static ?string $pluralModelLabel = 'Tahap Produksi';

    protected static ?string $recordTitleAttribute = 'stage_name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('stage_name')
                    ->label('Nama Tahap')
                    ->required()
                    ->maxLength(100)
                    ->unique(ignoreRecord: true),
                
                TextInput::make('stage_code')
                    ->label('Kode Tahap')
                    ->required()
                    ->maxLength(20)
                    ->unique(ignoreRecord: true)
                    ->alphaNum(),
                
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->maxLength(65535)
                    ->rows(3)
                    ->default(null)
                    ->columnSpanFull(),
                
                TextInput::make('sequence_order')
                    ->label('Urutan')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->helperText('Urutan tahap dalam proses produksi'),
                
                TextInput::make('estimated_duration')
                    ->label('Estimasi Durasi (menit)')
                    ->required()
                    ->numeric()
                    ->suffix('menit')
                    ->minValue(0)
                    ->default(0)
                    ->helperText('Estimasi waktu untuk menyelesaikan tahap ini'),
                
                ColorPicker::make('color')
                    ->label('Warna')
                    ->required()
                    ->default('#3B82F6'),
                
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true)
                    ->inline(false),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('stage_name'),
                TextEntry::make('stage_code'),
                TextEntry::make('sequence_order')
                    ->numeric(),
                TextEntry::make('estimated_duration')
                    ->numeric(),
                TextEntry::make('color'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                TextEntry::make('deleted_at')
                    ->dateTime(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('stage_name')
                    ->label('Nama Tahap')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('stage_code')
                    ->label('Kode')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),
                TextColumn::make('sequence_order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color('warning'),
                TextColumn::make('estimated_duration')
                    ->label('Estimasi Durasi')
                    ->numeric()
                    ->suffix(' menit')
                    ->sortable(),
                ColorColumn::make('color')
                    ->label('Warna')
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->description)
                    ->placeholder('-')
                    ->toggleable(),
                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sequence_order', 'asc')
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Status')
                    ->placeholder('Semua Tahap')
                    ->trueLabel('Hanya Aktif')
                    ->falseLabel('Hanya Nonaktif')
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
                    ->label('Tambah Tahap Produksi'),
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
            'index' => ManageProductionStages::route('/'),
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
