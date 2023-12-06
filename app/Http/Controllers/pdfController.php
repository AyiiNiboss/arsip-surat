<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\skModel;
use App\Models\smModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class pdfController extends Controller
{
    public function suratKeluar($id){
        $tgl_skrg = Carbon::now();
        $sk = skModel::FindOrFail($id);
        $datax = [
            'nama' => Auth::user()->name,
            'data' => $sk,
            'image' => public_path('storage/logo1.png'),
            'tgl' => $tgl_skrg,
        ];
        $pdf = app('dompdf.wrapper');
        $pdf = pdf::loadView('sekretaris.surat keluar.pdf-surat-keluar', $datax);
        return $pdf->stream();
        
    }

    public function suratDisposisi($id){
        $sm = smModel::with('bagianRelasi')->FindOrFail($id);
        $tgl_skrg = Carbon::now();
        $datax = [
            'data' => $sm,
            'image' => public_path('storage/logo1.png'),
            'tgl' => $tgl_skrg,
        ];
        $pdf = app('dompdf.wrapper');
        $pdf = pdf::loadView('surat masuk.sm-disposisi', $datax);
        return $pdf->stream();
    }
}
