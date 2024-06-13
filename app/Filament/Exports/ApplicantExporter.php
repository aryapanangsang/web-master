<?php

namespace App\Filament\Exports;

use App\Models\Applicant;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class ApplicantExporter extends Exporter
{
    protected static ?string $model = Applicant::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('appplicant_name'),
            ExportColumn::make('gender'),
            ExportColumn::make('birth_of'),
            ExportColumn::make('birth_of_date'),
            ExportColumn::make('address'),
            ExportColumn::make('phone_number'),
            ExportColumn::make('education_level'),
            ExportColumn::make('height'),
            ExportColumn::make('weight'),
            ExportColumn::make('identity_number'),
            ExportColumn::make('npwp'),
            ExportColumn::make('mother'),
            ExportColumn::make('emergency_contact'),
            ExportColumn::make('vaccine'),
            ExportColumn::make('reference'),
            ExportColumn::make('office'),
            ExportColumn::make('company'),
            ExportColumn::make('pre_test'),
            ExportColumn::make('test1'),
            ExportColumn::make('test2'),
            ExportColumn::make('post_test1'),
            ExportColumn::make('post_test2'),
            ExportColumn::make('mcu_date'),
            ExportColumn::make('mcu_result'),
            ExportColumn::make('join_date'),
            ExportColumn::make('finished'),
            ExportColumn::make('status'),
            ExportColumn::make('information'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your applicant export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
