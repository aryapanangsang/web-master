<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Applicant;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function downloadpdf()
    {
        $applicants = Applicant::all();

        $data = [
            'date' => date('m/d/Y'),
            'applicants' => $applicants
        ];

        $pdf = PDF::loadView('applicantPDF', $data);

        return $pdf->download('laporan.pdf');
    }

    public function applicantpdf($id)
    {
         $applicants = Applicant::find($id);
         $data = [
            'date' => date('m/d/Y'),
            'applicants' => $applicants
        ];
        $pdf = PDF::loadView('formulirPDF', $data);
        $named = 'Formulir' . ' ' . $applicants->appplicant_name;
        $format = $named . '.pdf';
        return $pdf->download($format);
    }
}
