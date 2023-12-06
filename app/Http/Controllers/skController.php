<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\skModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class skController extends Controller
{
    public function index(){
        $sk = skModel::where('tgl_arsip', NULL)->get();
        return view('surat keluar.sk', [
            'data' => $sk
        ]);
    }

    public function store(Request $request){
        $sk = skModel::create($request->all());
        if($sk){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Surat berhasil dibuat');
        }
        return redirect('/surat-keluar');
    }

    public function edit($id){
        $sk = skModel::FindOrFail($id);
        return view('surat keluar.sk-edit', [
            'data' => $sk
        ]);

    }

    public function update(Request $request, $id){
        $sk = skModel::FindOrFail($id);
        $request['aktivitas'] = 1;
        $sk->update($request->all());
        if($sk){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Surat berhasil diedit');
        }
        return redirect('/surat-keluar');
    }

    public function delete($id){
        $sk = skModel::FindOrFail($id);
        $sk->delete();
        if($sk){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Surat berhasil dihapus');
        }
        return redirect('/surat-keluar');
    }

    // surat keluar sekretaris
    public function validasiSekretaris($id){
        $sk = skModel::FindOrFail($id);
        return view('sekretaris.surat keluar.surat-keluar-validasi', [
            'data' => $sk
        ]);
    }

    public function prosesSekretaris(Request $request, $id){
        $sk = skModel::FindOrFail($id);
        $sk->update($request->all());
        if($sk){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil diverifikasi !!');
        }
        return redirect('/surat-keluar');
    }
    
    public function detailSekretaris($id){
        $sk = skModel::FindOrFail($id);
        return view('sekretaris.surat keluar.surat-keluar-detail',[
            'data' => $sk
        ]);
    }

    // surat keluar camat
    public function validasiCamat($id){
        $sk = skModel::FindOrFail($id);
        return view('camat.surat-keluar.sk-camat-validasi', [
            'data' => $sk
        ]);
    }

    public function ttdCamat(Request $request, $id){
        $image_parts = explode(";base64,", $request->ttds);
        $image_base64 = base64_decode($image_parts[1]);
        file_put_contents('ttd', $image_base64);
        
        $sk = skModel::FindOrFail($id);
        $request['ttd'] = $request->ttds;
        $request['aktivitas'] = 4;
        $sk->update($request->all());
        if($sk){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil diverifikasi !!');
        }
        return redirect('/surat-keluar');
    }

    public function detailCamat($id){
        $sk = skModel::FindOrFail($id);
        return view('camat.surat-keluar.sk-camat-detail', [
            'data' => $sk
        ]);
    }

    public function arsip(Request $request, $id){
        $sk = skModel::FindOrFail($id);
        $tgl_skrg = Carbon::now();
        $request['tgl_arsip'] = $tgl_skrg;
        $sk->update($request->all());
        if($sk){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil diarsip !!');
        }
        return redirect('/surat-keluar');
    }

    public function indexArsipSK(){
        $sk = skModel::whereNotNull('tgl_arsip')->get();
        return view('arsip.surat-keluar', [
            'data' => $sk
        ]);
    }

    public function detailArsipSK($id){
        $sk = skModel::FindOrFail($id);
        return view('arsip.surat-keluar-detail', [
            'data' => $sk
        ]);
    }

    public function deleteArsipSK($id){
        $sk = skModel::FindOrFail($id);
        $sk->delete();
        if($sk){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil dihapus !!');
        }
        return redirect('/surat-keluar-arsip');
    }
    
}