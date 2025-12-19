<?php

namespace App\Filament\Resources\PaymentTypes;

use App\Filament\Resources\PaymentTypes\Pages\ManagePaymentTypes;
use App\Models\PaymentType;
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
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class PaymentTypeResource extends Resource
{
    protected static ?string $model = PaymentType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static string | UnitEnum | null $navigationGroup = 'Transaksi';

    protected static ?int $navigationSort = 14;

    protected static ?string $navigationLabel = 'Tipe Pembayaran';

    protected static ?string $modelLabel = 'Tipe Pembayaran';

    protected static ?string $pluralModelLabel = 'Tipe Pembayaran';

    protected static ?string $recordTitleAttribute = 'type_name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('type_name')
                    ->label('Nama Tipe')
                    ->required()
                    ->maxLength(100)
                    ->unique(ignoreRecord: true),
                
                TextInput::make('type_code')
                    ->label('Kode Tipe')
                    ->required()
                    ->maxLength(20)
                    ->unique(ignoreRecord: true)
                    ->alphaNum(),
                
                TextInput::make('minimum_percentage')
                    ->label('Persentase Minimum')
                    ->numeric()
                    ->suffix('%')
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(null)
                    ->helperText('Persentase minimal untuk tipe pembayaran ini'),
                
                TextInput::make('maximum_percentage')
                    ->label('Persentase Maksimum')
                    ->numeric()
                    ->suffix('%')
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(null)
                    ->helperText('Persentase maksimal untuk tipe pembayaran ini'),
                
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->maxLength(65535)
                    ->rows(3)
                    ->default(null)
                    ->columnSpanFull(),
                
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
                TextEntry::make('type_name'),
                TextEntry::make('type_code'),
                TextEntry::make('minimum_percentage')
                    ->numeric(),
                TextEntry::make('maximum_percentage')
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
                TextColumn::make('type_name')
                    ->label('Nama Tipe')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type_code')
                    ->label('Kode')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),
                TextColumn::make('minimum_percentage')
                    ->label('Min %')
                    ->numeric()
                    ->suffix('%')
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('maximum_percentage')
                    ->label('Max %')
                    ->numeric()
                    ->suffix('%')
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->toggleable()
                    ->placeholder('-'),
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
            ->defaultSort('type_name', 'asc')
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Status')
                    ->placeholder('Semua Tipe')
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
                    ->label('Tambah Tipe Pembayaran'),
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
            'index' => ManagePaymentTypes::route('/'),
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
