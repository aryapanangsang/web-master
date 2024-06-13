<?php

namespace App\Livewire;

use Filament\Forms;
use Livewire\Component;
use Filament\Forms\Form;
use App\Models\Applicant;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use RealRashid\SweetAlert\Facades\Alert;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;

class Home extends Component implements HasForms
{

    use InteractsWithForms;

    public $appplicant_name ='';
    public $gender ='';
    public $birth_of ='';
    public $birth_of_date ='';
    public $address ='';
    public $phone_number ='';
    public $education_level ='';
    public $height ='';
    public $weight ='';
    public $identity_number ='';
    public $npwp ='';    
    public $mother ='';
    public $emergency_contact ='';
    public $vaccine ='';
    public $reference ='';
    public $office ='';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Data Identitas')            
            ->schema([                
                Forms\Components\TextInput::make('appplicant_name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan'
                    ])
                    ->required(),
                Forms\Components\TextInput::make('birth_of')
                    ->label('Tempat Lahir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('birth_of_date')
                    ->label('Tanggal Lahir')
                    ->required(),
                Forms\Components\TextInput::make('address')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(255),                    
                Forms\Components\TextInput::make('phone_number')    
                    ->label('No. Handphone')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('identity_number')
                    ->label('NIK')
                    ->required()
                    ->maxLength(16)                     
                    ->unique(table: Applicant::class),
                    ])->columns(4),

            Section::make('Data Pandukung')
            ->schema([
                Forms\Components\Select::make('education_level')
                    ->options([
                        'SMK' => 'SMK',
                        'SMA' => 'SMA',
                        'MA' => 'MA'
                    ])
                    ->label('Pendidikan Terakhir')
                    ->required(),                    
                Forms\Components\TextInput::make('height')
                    ->label('Tinggi Badan')
                    ->required()
                    ->maxLength(3),
                Forms\Components\TextInput::make('weight')
                    ->label('Berat Badan')
                    ->required()
                    ->maxLength(2),                
                Forms\Components\TextInput::make('npwp')
                    ->label('No. NPWP')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mother')
                    ->label('Nama Ibu')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('emergency_contact')
                    ->label('Kontak Darurat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('vaccine')
                    ->label('Vaksin')
                    ->required()
                    ->maxLength(1),
                Forms\Components\TextInput::make('reference')
                    ->label('Referensi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('office')
                    ->label('Kantor Tujuan')
                    ->options([
                        'Cikarang' => 'Cikarang',
                        'Purwakarta' => 'Purwakarta'
                    ])
                    ->required()
                    ->columnspan('full'),     
            ])->columns(4)
        ]);
    }
    

    public function render()
    {
        return view('livewire.home');
    }

    public function save(): void
    {
        $data = $this->form->getState();                  
        Applicant::insert($data);
        // Alert::success('Frmulir Berhasil Disimpan', 'Silahkan ');

        session()->flash('message', 'Formulir Berhasil Dikirim');
    }
}
