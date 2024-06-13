<?php

namespace App\Filament\Resources\ApplicantResource\Pages;

use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Exports\ApplicantExporter;
use App\Filament\Resources\ApplicantResource;
use Filament\Actions\Exports\Enums\ExportFormat;

class ListApplicants extends ListRecords
{
    protected static string $resource = ApplicantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),     
            ExportAction::make('Export')->label('Export')
                    ->exporter(ApplicantExporter::class)
                    ->formats([
                        ExportFormat::Xlsx,
                    ])       
        ];
    }
}
