<?php

namespace App\Filament\Resources;

use App\Filament\Resources\McuResource\Pages;
use App\Filament\Resources\McuResource\RelationManagers;
use App\Models\Mcu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class McuResource extends Resource
{
    protected static ?string $model = Mcu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationLabel = 'MCU';
    protected static ?string $modelLabel = 'MCU List';
    protected static ?int $navigationSort= 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMcus::route('/'),
            'create' => Pages\CreateMcu::route('/create'),
            'edit' => Pages\EditMcu::route('/{record}/edit'),
        ];
    }
}
