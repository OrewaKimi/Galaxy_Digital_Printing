<?php

namespace App\Filament\Resources\OrderStatuses;

use App\Filament\Resources\OrderStatuses\Pages\ManageOrderStatuses;
use App\Models\OrderStatus;
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


class OrderStatusResource extends Resource
{
    protected static ?string $model = OrderStatus::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCheckCircle;
    
    protected static string | UnitEnum | null $navigationGroup = 'Produksi';

    protected static ?int $navigationSort = 42;

    protected static ?string $navigationLabel = 'Status Order';

    protected static ?string $modelLabel = 'Status Order';

    protected static ?string $pluralModelLabel = 'Status Order';

    protected static ?string $recordTitleAttribute = 'status_name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('status_name')
                    ->label('Nama Status')
                    ->required()
                    ->maxLength(100)
                    ->unique(ignoreRecord: true),
                
                TextInput::make('status_code')
                    ->label('Kode Status')
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
                
                ColorPicker::make('color')
                    ->label('Warna')
                    ->required()
                    ->default('#3B82F6'),
                
                TextInput::make('sequence_order')
                    ->label('Urutan')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->helperText('Urutan status dalam alur order'),
                
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
                TextEntry::make('status_name'),
                TextEntry::make('status_code'),
                TextEntry::make('color'),
                TextEntry::make('sequence_order')
                    ->numeric(),
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
                TextColumn::make('status_name')
                    ->label('Nama Status')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn ($record) => $record->color ?? 'gray'),
                TextColumn::make('status_code')
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
                    ->placeholder('Semua Status')
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
                    ->label('Tambah Status Order'),
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
            'index' => ManageOrderStatuses::route('/'),
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
