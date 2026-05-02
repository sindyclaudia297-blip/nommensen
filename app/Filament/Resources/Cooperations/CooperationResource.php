<?php

namespace App\Filament\Resources\Cooperations;

use App\Filament\Resources\Cooperations\Pages\CreateCooperation;
use App\Filament\Resources\Cooperations\Pages\EditCooperation;
use App\Filament\Resources\Cooperations\Pages\ListCooperations;
use App\Filament\Resources\Cooperations\Schemas\CooperationForm;
use App\Filament\Resources\Cooperations\Tables\CooperationsTable;
use App\Models\Cooperation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class CooperationResource extends Resource
{
    // 1. MODEL — entitas yang dikelola resource ini
    protected static ?string $model = Cooperation::class;

    // 2. NAVIGATION ICON — icon di sidebar
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'Kerja Sama';        // ← Label di menu sidebar
    protected static ?string $modelLabel = 'Kerja Sama';             // ← Label untuk satu item
    protected static ?string $pluralModelLabel = 'Kerja Sama';       // ← Label untuk banyak item
    protected static string|UnitEnum|null $navigationGroup = 'Manajemen Konten';  // ← Grup menu
    protected static ?int $navigationSort = 1;                        // ← Urutan di menu

    // 3. FORM — mendefinisikan field-field input
    public static function form(Schema $schema): Schema
    {
        return CooperationForm::configure($schema);
    }

    // 4. TABLE — mendefinisikan kolom-kolom tabel daftar
    public static function table(Table $table): Table
    {
        return CooperationsTable::configure($table);
    }

    // 5. RELATIONS — relasi yang ditampilkan (opsional)
    public static function getRelations(): array
    {
        return [];
    }

    // 6. PAGES — halaman-halaman yang tersedia
    public static function getPages(): array
    {
        return [
            'index' => ListCooperations::route('/'),
            'create' => CreateCooperation::route('/create'),
            'edit' => EditCooperation::route('/{record}/edit'),
        ];
    }
}