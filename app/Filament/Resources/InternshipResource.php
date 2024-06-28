<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Applicant;
use App\Models\Internship;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InternshipResource\Pages;
use App\Filament\Resources\InternshipResource\RelationManagers;

class InternshipResource extends Resource
{
    protected static ?string $model = Applicant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationLabel = 'Internship';
    protected static ?string $modelLabel = 'Internship List';
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
                TextColumn::make('applicant_name')
                ->searchable(),
                TextColumn::make('company.comany_name'),
            ])
            ->filters([
            SelectFilter::make('status_id')
                ->label('Status Progres')                                       
                ->relationship('status', 'status_name')
                ->default(1),

            SelectFilter::make('company_id')
                ->label('Perusahaan')                                       
                ->relationship('company', 'company_name')
                ->default(1),               
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
            'index' => Pages\ListInternships::route('/'),
            'create' => Pages\CreateInternship::route('/create'),
            'edit' => Pages\EditInternship::route('/{record}/edit'),
        ];
    }
}
