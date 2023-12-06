<?php

namespace App\Http\Controllers;

use App\Models\bukutamuModel;
use App\Models\skModel;
use App\Models\smModel;
use Illuminate\Http\Request;
use Symfony\Component\Console\Command\DumpCompletionCommand;

class laporanArsipController extends Controller
{
    public function cariSuratMasuk(Request $request){
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $query = smModel::query();
        if ($tanggalAwal) {
            $query->whereDate('tgl_arsip', '>=', $tanggalAwal);
        }
        
        if ($tanggalAkhir) {
            $query->whereDate('tgl_arsip', '<=', $tanggalAkhir);
        }
        
        $results = $query->whereNotNull('tgl_arsip')->get();

        $tgl_a = $_GET['tanggal_awal'];
        $tgl_b = $_GET['tanggal_akhir'];
        
        if ($request->has('search')) {
            // Proses pencarian data
            return view('arsip.surat-masuk', [
                'data' => $results,
                
            ]);
        } elseif ($request->has('export_pdf')) {
            // Proses ekspor ke PDF
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('laporan.laporan-surat-masuk', ['data' => $results, 'image' => public_path('storage/logo1.png'), 'tanggal_a' => $tgl_a, 'tanggal_b' => $tgl_b ])->setWarnings(false)->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            return $pdf->stream();
        }
    }

    public function cariSuratKeluar(Request $request){
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $query = skModel::query();
        if ($tanggalAwal) {
            $query->whereDate('tgl_arsip', '>=', $tanggalAwal);
        }
        
        if ($tanggalAkhir) {
            $query->whereDate('tgl_arsip', '<=', $tanggalAkhir);
        }
        
        $results = $query->whereNotNull('tgl_arsip')->get();

        $tgl_a = $_GET['tanggal_awal'];
        $tgl_b = $_GET['tanggal_akhir'];
        
        if ($request->has('search')) {
            // Proses pencarian data
            return view('arsip.surat-keluar', [
                'data' => $results,
                
            ]);
        } elseif ($request->has('export_pdf')) {
            // Proses ekspor ke PDF
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('laporan.laporan-surat-keluar', ['data' => $results, 'image' => public_path('storage/logo1.png'), 'tanggal_a' => $tgl_a, 'tanggal_b' => $tgl_b ])->setWarnings(false)->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            return $pdf->stream();
        }
    }

    public function caribukuTamu(Request $request){
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $query = bukutamuModel::query();
        if ($tanggalAwal) {
            $query->whereDate('tanggal', '>=', $tanggalAwal);
        }
        
        if ($tanggalAkhir) {
            $query->whereDate('tanggal', '<=', $tanggalAkhir);
        }
        
        $results = $query->get();

        $tgl_a = $_GET['tanggal_awal'];
        $tgl_b = $_GET['tanggal_akhir'];
        
        if ($request->has('search')) {
            // Proses pencarian data
            return view('arsip.buku-tamu', [
                'data' => $results,
                
            ]);
        } elseif ($request->has('export_pdf')) {
            // Proses ekspor ke PDF
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('laporan.laporan-buku-tamu', ['data' => $results, 'image' => public_path('storage/logo1.png'), 'tanggal_a' => $tgl_a, 'tanggal_b' => $tgl_b ])->setWarnings(false)->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            return $pdf->stream();
        }
    }

    public function dashboard(){
        $sm = smModel::whereNotNull('tgl_arsip')->count();
        $sk = skModel::whereNotNull('tgl_arsip')->count();
        $sm1 = smModel::where('tgl_arsip', null)->count();
        $sk1 = skModel::where('tgl_arsip', null)->count();
        return view('dashboard.dashboard', [
            'data_sm' => $sm,
            'data_sk' => $sk,
            'data_sm1' => $sm1,
            'data_sk1' => $sk1
        ]);
    }

}
