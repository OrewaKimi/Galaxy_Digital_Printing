<?php

namespace App\Filament\Resources\DesignFiles;

use App\Enums\FileCategory;
use App\Filament\Resources\DesignFiles\Pages\ManageDesignFiles;
use App\Models\DesignFile;
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
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class DesignFileResource extends Resource
{
    protected static ?string $model = DesignFile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static string | UnitEnum | null $navigationGroup = 'Produk & Material';

    protected static ?int $navigationSort = 23;

    protected static ?string $navigationLabel = 'File Desain';

    protected static ?string $modelLabel = 'File Desain';

    protected static ?string $pluralModelLabel = 'File Desain';

    protected static ?string $recordTitleAttribute = 'file_name';

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
                
                FileUpload::make('file_path')
                    ->label('File')
                    ->disk('public')
                    ->directory('design-files')
                    ->preserveFilenames()
                    ->acceptedFileTypes(['image/*', 'application/pdf', 'application/zip'])
                    ->maxSize(51200)
                    ->required()
                    ->columnSpanFull(),
                
                TextInput::make('file_name')
                    ->label('Nama File')
                    ->required()
                    ->maxLength(255),
                
                Select::make('file_category')
                    ->label('Kategori File')
                    ->options(FileCategory::options())
                    ->default(FileCategory::CUSTOMER_UPLOAD->value)
                    ->required()
                    ->native(false),
                
                TextInput::make('version')
                    ->label('Versi')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->default(1),
                
                TextInput::make('file_size')
                    ->label('Ukuran File (KB)')
                    ->numeric()
                    ->suffix('KB')
                    ->default(null),
                
                TextInput::make('file_type')
                    ->label('Tipe File')
                    ->maxLength(50)
                    ->default(null),
                
                TextInput::make('mime_type')
                    ->label('MIME Type')
                    ->maxLength(100)
                    ->default(null),
                
                Select::make('uploaded_by')
                    ->label('Diupload Oleh')
                    ->relationship('uploader', 'full_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->full_name . ' (' . $record->email . ')')
                    ->searchable(['full_name', 'email', 'username'])
                    ->preload()
                    ->required(),

                DateTimePicker::make('uploaded_date')
                    ->label('Tanggal Upload')
                    ->required()
                    ->default(now())
                    ->native(false),
                    
                Toggle::make('is_approved')
                    ->label('Sudah Disetujui')
                    ->default(false)
                    ->inline(false),

                Select::make('approved_by')
                    ->label('Disetujui Oleh')
                    ->relationship('approver', 'full_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->full_name . ' (' . $record->email . ')')
                    ->searchable(['full_name', 'email', 'username'])
                    ->preload()
                    ->default(null),

                DateTimePicker::make('approved_date')
                    ->label('Tanggal Disetujui')
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
                TextEntry::make('order_id')
                    ->label('Order ID')
                    ->numeric(),
                TextEntry::make('item_id')
                    ->label('Item ID')
                    ->numeric(),
                TextEntry::make('file_name')
                    ->label('Nama File'),
                TextEntry::make('file_path')
                    ->label('Path File'),
                TextEntry::make('file_size')
                    ->label('Ukuran File'),
                TextEntry::make('file_type')
                    ->label('Tipe File'),
                TextEntry::make('mime_type')
                    ->label('MIME Type'),
                TextEntry::make('file_category')
                    ->label('Kategori'),
                TextEntry::make('version')
                    ->label('Versi')
                    ->numeric(),
                TextEntry::make('uploader.full_name')
                    ->label('Diupload Oleh'),
                TextEntry::make('uploaded_date')
                    ->label('Tanggal Upload')
                    ->dateTime(),
                IconEntry::make('is_approved')
                    ->label('Disetujui')
                    ->boolean(),
                TextEntry::make('approver.full_name')
                    ->label('Disetujui Oleh'),
                TextEntry::make('approved_date')
                    ->label('Tanggal Disetujui')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order.order_number')
                    ->label('No. Order')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('file_name')
                    ->label('Nama File')
                    ->searchable()
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->file_name),
                TextColumn::make('file_category')
                    ->label('Kategori')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => FileCategory::from($state)->label())
                    ->color(fn (string $state): string => match ($state) {
                        'customer_upload' => 'info',
                        'designer_draft' => 'warning',
                        'final_design' => 'success',
                        'revision' => 'danger',
                        'reference' => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('version')
                    ->label('Ver.')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('uploader.full_name')
                    ->label('Upload Oleh')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('uploaded_date')
                    ->label('Tgl Upload')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                IconColumn::make('is_approved')
                    ->label('Disetujui')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('approver.full_name')
                    ->label('Disetujui Oleh')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->defaultSort('uploaded_date', 'desc')
            ->filters([
                SelectFilter::make('file_category')
                    ->label('Kategori')
                    ->options(FileCategory::options())
                    ->native(false),
                TernaryFilter::make('is_approved')
                    ->label('Status Persetujuan')
                    ->placeholder('Semua')
                    ->trueLabel('Sudah Disetujui')
                    ->falseLabel('Belum Disetujui')
                    ->native(false),
                SelectFilter::make('order_id')
                    ->label('Order')
                    ->relationship('order', 'order_number')
                    ->searchable()
                    ->preload(),
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
                    ->label('Tambah File Desain'),
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
            'index' => ManageDesignFiles::route('/'),
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