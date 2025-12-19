<?php

namespace App\Filament\Resources\Customers;

use App\Enums\CustomerType;
use App\Filament\Resources\Customers\Pages\ManageCustomers;
use App\Models\Customer;
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

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static string | UnitEnum | null $navigationGroup = 'Pengguna & Pelanggan';

    protected static ?int $navigationSort = 30;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Pelanggan';

    protected static ?string $modelLabel = 'Pelanggan';

    protected static ?string $pluralModelLabel = 'Pelanggan';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Pengguna')
                    ->relationship('user', 'full_name')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Masukkan nama lengkap'),

                TextInput::make('company_name')
                    ->label('Nama Perusahaan')
                    ->maxLength(255)
                    ->placeholder('Opsional untuk pelanggan bisnis')
                    ->nullable(),

                Textarea::make('address')
                    ->label('Alamat')
                    ->rows(3)
                    ->maxLength(500)
                    ->placeholder('Masukkan alamat lengkap')
                    ->nullable()
                    ->columnSpanFull(),

                TextInput::make('phone')
                    ->label('Nomor Telepon')
                    ->tel()
                    ->required()
                    ->maxLength(20)
                    ->placeholder('08xxxxxxxxxx')
                    ->telRegex('/^[+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/'),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->placeholder('contoh@email.com'),

                Select::make('customer_type')
                    ->label('Tipe Pelanggan')
                    ->options(CustomerType::options())
                    ->default(CustomerType::PERSONAL->value)
                    ->required()
                    ->native(false),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.full_name')
                    ->label('Pengguna')
                    ->placeholder('-'),

                TextEntry::make('name')
                    ->label('Nama Lengkap'),

                TextEntry::make('company_name')
                    ->label('Nama Perusahaan')
                    ->placeholder('-'),

                TextEntry::make('address')
                    ->label('Alamat')
                    ->placeholder('-'),

                TextEntry::make('phone')
                    ->label('Nomor Telepon'),

                TextEntry::make('email')
                    ->label('Email')
                    ->copyable()
                    ->icon('heroicon-o-envelope'),

                TextEntry::make('customer_type')
                    ->label('Tipe Pelanggan')
                    ->formatStateUsing(fn (string $state): string => CustomerType::from($state)->label())
                    ->badge()
                    ->color(fn (string $state): string => CustomerType::from($state)->getColor()),

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
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('company_name')
                    ->label('Nama Perusahaan')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-'),

                TextColumn::make('phone')
                    ->label('Nomor Telepon')
                    ->searchable()
                    ->icon('heroicon-o-phone')
                    ->copyable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->icon('heroicon-o-envelope')
                    ->copyable(),

                TextColumn::make('customer_type')
                    ->label('Tipe')
                    ->formatStateUsing(fn (string $state): string => CustomerType::from($state)->label())
                    ->badge()
                    ->color(fn (string $state): string => CustomerType::from($state)->getColor())
                    ->sortable(),

                TextColumn::make('user.full_name')
                    ->label('Pengguna Terkait')
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: true),

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
                SelectFilter::make('customer_type')
                    ->label('Tipe Pelanggan')
                    ->options(CustomerType::options())
                    ->native(false),

                TrashedFilter::make()
                    ->label('Status'),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                CreateAction::make()
                    ->label('Tambah Pelanggan'),
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
            'index' => ManageCustomers::route('/'),
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
