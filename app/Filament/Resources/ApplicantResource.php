<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Applicant;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\ApplicantExporter;
use Filament\Tables\Actions\ExportAction;   
use Filament\Actions\Exports\Enums\ExportFormat;
use App\Filament\Resources\ApplicantResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ApplicantResource\RelationManagers;

class ApplicantResource extends Resource
{
    protected static ?string $model = Applicant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([       
                Forms\Components\Section::make('Applicant identity')         
                ->description('Put the user details in.')
                ->schema([
                        Forms\Components\TextInput::make('appplicant_name')
                        ->required()
                        ->maxLength(255),
                        Forms\Components\Select::make('gender')
                            ->options([
                                'Laki-laki' => 'Laki-laki',
                                'Perempuan' => 'Perempuan'
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('birth_of')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('birth_of_date')
                            ->required(),
                        Forms\Components\TextInput::make('address')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone_number')
                            ->tel()
                            ->required()
                            ->numeric()
                            ->maxLength(255),
                        ])->columns(3),
                    
                    
                Forms\Components\Section::make('Additional Data')
                ->schema([
                        Forms\Components\Select::make('education_level')
                        ->options([
                            'SMK' => 'SMK',
                            'SMA' => 'SMA',
                            'MA' => 'MA'
                        ])
                        ->required(),                    
                        Forms\Components\TextInput::make('height')
                            ->required()
                            ->maxLength(3),
                        Forms\Components\TextInput::make('weight')
                            ->required()
                            ->maxLength(2),
                        Forms\Components\TextInput::make('identity_number')
                            ->required()
                            ->maxLength(16)
                            ->unique(ignoreRecord: True),
                        Forms\Components\TextInput::make('npwp')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('emergency_contact')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('vaccine')
                            ->required()
                            ->maxLength(1),
                        Forms\Components\TextInput::make('reference')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('office')
                            ->options([
                                'Cikarang' => 'Cikarang',
                                'Perempuan' => 'Perempuan'
                            ])
                            ->required(),
                ])->columns(3),
                

                Forms\Components\Section::make('Data Processed')
                ->schema([
                    Forms\Components\Select::make('company')                    
                        ->options([
                            'PT. IMC' => 'PT. IMC',
                            'PT. SSI' => 'PT. SSI',
                            'PT. CPM' => 'PT. CPM',
                            'PT. Liwayway' => 'PT. Liwayway',
                            'PT. Nippisun' => 'PT. Nippisun',
                            'PT. Webus' => 'PT. Webus',
                            'PT. Taeyong' => 'PT. Taeyong',
                            'PT. AKM' => 'PT. AKM'                            
                        ]),
                    Forms\Components\TextInput::make('pre_test')                    
                        ->maxLength(255)
                        ->numeric(),
                    Forms\Components\TextInput::make('test1')
                        ->maxLength(255)
                        ->numeric(),
                    Forms\Components\TextInput::make('test2')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('post_test1')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('post_test2')
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('mcu_date'),
                    Forms\Components\TextInput::make('mcu_result')
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('join_date'),
                    Forms\Components\DatePicker::make('finished'),
                    Forms\Components\Select::make('status')
                            ->options([
                                'Qualified' => 'Qualified',
                                'Tes' => 'Tes',
                                'Interview' => 'Interview',
                                'MCU' => 'MCU',
                                'Training' => 'Training',
                                'Aktif' => 'Aktif',
                                'Selesai' => 'Selesai',
                                'Cut Off' => 'Cut Off',
                                'Resign' => 'Resign'
                            ]),
                    Forms\Components\TextInput::make('information')
                        ->maxLength(255),
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->headerActions([
            //     ExportAction::make('Export')->label('Export')
            //         ->exporter(ApplicantExporter::class)
            //         ->formats([
            //             ExportFormat::Xlsx,
            //         ])
            // ])
            ->columns([                
                Tables\Columns\TextColumn::make('appplicant_name')->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')->label('Jenis Kelamin'),
                Tables\Columns\TextColumn::make('birth_of')->label('Tempat Lahir')
                ->formatStateUsing(function ($state, Applicant $order) {
                    $tgl_daftar = Carbon::create($order->birth_of_date);
                    return $order->birth_of . ', ' . $tgl_daftar->isoFormat('D MMMM Y');
                })
                    ->searchable(),                
                Tables\Columns\TextColumn::make('address')->label('Alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')->label('No. Hp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('education_level')->label('Pendidikan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('height')->label('TB')
                    ->searchable(),
                Tables\Columns\TextColumn::make('weight')->label('BB')
                    ->searchable(),
                Tables\Columns\TextColumn::make('identity_number')->label('NIK')
                    ->searchable(),
                Tables\Columns\TextColumn::make('npwp')->label('NPWP')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother')->label('IBU')
                    ->searchable(),
                Tables\Columns\TextColumn::make('emergency_contact')->label('Kontak Darurat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vaccine')->label('Vaksin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reference')->label('Referensi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('office')->label('Kantor Tujuan'),
                Tables\Columns\TextColumn::make('company')->label('Perusahaan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pre_test')->label('Pre Test')
                    ->searchable(),
                Tables\Columns\TextColumn::make('test1')->label('Tes 1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('test2')->label('Tes 2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('post_test1')->label('Post Tes 1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('post_test2')->label('Post Tes 2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mcu_date')->label('Tgl. MCU')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mcu_result')->label('Hasil MCU')
                    ->searchable(),
                Tables\Columns\TextColumn::make('join_date')->label('Masuk')
                    ->date(),            
                Tables\Columns\TextColumn::make('finished')->label('Selesai')
                    ->date(),                   
                Tables\Columns\TextColumn::make('status')->label('Status')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('information')->label('Keterangan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()                    
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('company')
                ->options([
                    'PT. IMC' => 'PT. IMC',
                    'PT. SSI' => 'PT. SSI',
                    'PT. CPM' => 'PT. CPM',
                    'PT. Liwayway' => 'PT. Liwayway',
                    'PT. Nippisun' => 'PT. Nippisun',
                    'PT. Webus' => 'PT. Webus',
                    'PT. Taeyong' => 'PT. Taeyong',
                    'PT. AKM' => 'PT. AKM'                            
                ]),

                SelectFilter::make('status')                    
                ->options([
                    'Qualified' => 'Qualified',
                    'Tes' => 'Tes',
                    'Interview' => 'Interview',
                    'MCU' => 'MCU',
                    'Training' => 'Training',
                    'Aktif' => 'Aktif',
                    'Selesai' => 'Selesai',
                    'Cut Off' => 'Cut Off',
                    'Resign' => 'Resign'
                ]),
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
            'index' => Pages\ListApplicants::route('/'),
            'create' => Pages\CreateApplicant::route('/create'),
            'edit' => Pages\EditApplicant::route('/{record}/edit'),
        ];
    }
}
