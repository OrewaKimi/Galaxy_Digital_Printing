<?php

namespace App\Filament\Resources\Users;

use App\Enums\UserRole;
use App\Filament\Resources\Users\Pages\ManageUsers;
use App\Models\User;
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
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use UnitEnum;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedIdentification;

    protected static string | UnitEnum | null $navigationGroup = 'Pengguna & Pelanggan';

    protected static ?int $navigationSort = 31;

    protected static ?string $recordTitleAttribute = 'full_name';

    protected static ?string $navigationLabel = 'Pengguna';

    protected static ?string $modelLabel = 'Pengguna';

    protected static ?string $pluralModelLabel = 'Pengguna';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('username')
                    ->label('Username')
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->placeholder('Opsional')
                    ->nullable(),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->minLength(8)
                    ->maxLength(255)
                    ->placeholder('Minimal 8 karakter'),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->placeholder('contoh@email.com'),

                TextInput::make('phone')
                    ->label('Nomor Telepon')
                    ->tel()
                    ->maxLength(20)
                    ->placeholder('08xxxxxxxxxx')
                    ->telRegex('/^[+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/')
                    ->nullable(),

                TextInput::make('full_name')
                    ->label('Nama Lengkap')
                    ->maxLength(255)
                    ->placeholder('Masukkan nama lengkap')
                    ->nullable(),

                Select::make('role')
                    ->label('Role')
                    ->options(UserRole::options())
                    ->default(UserRole::CUSTOMER->value)
                    ->required()
                    ->native(false),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true)
                    ->required(),

                DateTimePicker::make('last_login')
                    ->label('Login Terakhir')
                    ->disabled()
                    ->dehydrated(false),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('username')
                    ->label('Username')
                    ->placeholder('-'),

                TextEntry::make('email')
                    ->label('Email')
                    ->copyable()
                    ->icon('heroicon-o-envelope'),

                TextEntry::make('phone')
                    ->label('Nomor Telepon')
                    ->placeholder('-')
                    ->icon('heroicon-o-phone'),

                TextEntry::make('full_name')
                    ->label('Nama Lengkap')
                    ->placeholder('-'),

                TextEntry::make('role')
                    ->label('Role')
                    ->formatStateUsing(fn (string $state): string => UserRole::from($state)->label())
                    ->badge()
                    ->color(fn (string $state): string => UserRole::from($state)->getColor()),

                IconEntry::make('is_active')
                    ->label('Status Aktif')
                    ->boolean(),

                TextEntry::make('last_login')
                    ->label('Login Terakhir')
                    ->dateTime('d M Y H:i')
                    ->placeholder('Belum pernah login'),

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
                TextColumn::make('full_name')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-'),

                TextColumn::make('username')
                    ->label('Username')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-'),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->icon('heroicon-o-envelope')
                    ->copyable(),

                TextColumn::make('phone')
                    ->label('Nomor Telepon')
                    ->searchable()
                    ->icon('heroicon-o-phone')
                    ->placeholder('-'),

                TextColumn::make('role')
                    ->label('Role')
                    ->formatStateUsing(fn (string $state): string => UserRole::from($state)->label())
                    ->badge()
                    ->color(fn (string $state): string => UserRole::from($state)->getColor())
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                TextColumn::make('last_login')
                    ->label('Login Terakhir')
                    ->dateTime('d M Y H:i')
                    ->sortable()
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
                SelectFilter::make('role')
                    ->label('Role')
                    ->options(UserRole::options())
                    ->native(false),

                TernaryFilter::make('is_active')
                    ->label('Status Aktif')
                    ->placeholder('Semua')
                    ->trueLabel('Aktif')
                    ->falseLabel('Tidak Aktif')
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
                    ->label('Tambah Pengguna'),
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
            'index' => ManageUsers::route('/'),
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
