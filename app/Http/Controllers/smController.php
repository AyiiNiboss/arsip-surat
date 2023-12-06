<?php

namespace App\Http\Controllers;

use Response;
use Carbon\Carbon;
use App\Models\smModel;
use App\Models\BagianModel;
use App\Models\skModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class smController extends Controller
{
    public function index(){
        $sm = smModel::where('tgl_arsip', NULL)->get();
        return view('surat masuk.sm', [
            'data' => $sm
        ]);
    }

    public function store(Request $request){

        $newname = '';
        if($request->hasFile('files')){
        $ektension = $request->file('files')->getClientOriginalExtension();
        $newname = $request->pengirim.'-'.now()->timestamp.'.'.$ektension;
        $request->file('files')->storeAs('surat-masuk', $newname);
        }
        $request['file'] = $newname;
        $request['aktivitas'] = 1;
        
        $bagian = smModel::create($request->all());
        if($bagian){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil ditambah');
        }
        return redirect('/surat-masuk');
    }

    public function detail($id){
        $sm = smModel::FindOrFail($id);
        return view('surat masuk.sm-detail', [
            'data' => $sm
        ]);
    }

    public function download($id){
        $sm = smModel::FindOrFail($id); 
        $filepath = public_path("storage/surat-masuk/{$sm->file}");
        return response()->download($filepath);
    }

    public function edit($id){
        $sm = smModel::FindOrFail($id);
        return view('surat masuk.sm-edit', [
            'data' => $sm
        ]);
    }

    public function update(Request $request, $id){
        $sm = smModel::FindOrFail($id);
        if($request->hasFile('files')){
            //menghapus file yang lama yang ingin diubah
            $path = '../public/storage/surat-masuk/'.$sm->file;
            if(File::exists($path)){
                File::delete($path);
            }
            $ektension = $request->file('files')->getClientOriginalExtension();
            $newname = $request->pengirim.'-'.now()->timestamp.'.'.$ektension;
            $request->file('files')->storeAs('surat-masuk', $newname);
            $request['file'] = $newname;
        }
        $request['aktivitas'] = 1;
        $sm->update($request->all());
        if($sm){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil diedit !!');
        }
        return redirect('/surat-masuk');
    }

    public function delete($id){
        $sm = smModel::FindOrFail($id);
        $path = '../public/storage/surat-masuk/'.$sm->file;
            if(File::exists($path)){
                File::delete($path);
            }
        $sm->delete();
        if($sm){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil dihapus !!');
        }
        return redirect('/surat-masuk');
    }

    public function arsip(Request $request, $id){
        $sm = smModel::FindOrFail($id);
        $tgl_skrg = Carbon::now();
        $request['tgl_arsip'] = $tgl_skrg;

        $sm->update($request->all());
        if($sm){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil diarsip !!');
        }
        return redirect('/surat-masuk');

    }

    public function indexArsipSM(){
        $sm = smModel::whereNotNull('tgl_arsip')->get();
        return view('arsip.surat-masuk', [
            'data' => $sm
        ]);
    }

    public function detailArsipSM($id){
        $sm = smModel::FindOrFail($id);
        return view('arsip.surat-masuk-detail', [
            'data' => $sm
        ]);
    }

    public function deleteArsipSM($id){
        $sm = smModel::FindOrFail($id);
        $path = '../public/storage/surat-masuk/'.$sm->file;
            if(File::exists($path)){
                File::delete($path);
            }
        $sm->delete();
        if($sm){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil dihapus !!');
        }
        return redirect('/surat-masuk-arsip');
    }
    // sekretaris
    public function indexSekretaris(){
        $sm = smModel::where('tgl_arsip', NULL)->get();
        return view('sekretaris.surat-masuk.surat-masuk', [
            'data' => $sm
        ]);
    }

    public function ajukanSekretaris($id){
        $sm = smModel::FindOrFail($id);
        return view('sekretaris.surat-masuk.surat-masuk-detail', [
            'data' => $sm
        ]);
    }

    public function prosesSekretaris(Request $request, $id){
        $sm = smModel::FindOrFail($id);
        $sm->update($request->all());
        if($sm){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil diproses !!');
        }
        return redirect('/sm-sekretaris');
    }

    public function detailSekretaris($id){
        $sm =smModel::FindOrFail($id);
        return view('sekretaris.surat-masuk.surat-masuk-check', [
            'data' => $sm
        ]);
    }

    public function indexCamat(){
        $sm = smModel::where('tgl_arsip', NULL)->get();
        
        return view('camat.surat-masuk.sm-camat', [
            'data' => $sm,
            
        ]);
    }

    public function ajukanCamat($id){
        $sm = smModel::FindOrFail($id);
        $data_bagians = BagianModel::all();
        return view('camat.surat-masuk.sm-camat-ajukan', [
            'data' => $sm,
            'data_bagian' => $data_bagians
        ]);
    }

    public function prosesCamat(Request $request, $id){
        $sm = smModel::FindOrFail($id);
        $request['aktivitas'] = 4;
        $request['bagian_id'] = $request->disposisi;
        $sm->update($request->all());
        if($sm){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil verifikasi !!');
        }
        return redirect('/sm-camat');

    }

    public function detailCamat($id){
        $sm =smModel::with('bagianRelasi')->FindOrFail($id);
        return view('camat.surat-masuk.sm-camat-detail', [
            'data' => $sm
        ]);
    }

    public function validasiCamat($id){
        $sk = skModel::FindOrFail($id);
        return view('camat.surat-keluar.sk-camat-validasi', [
            'data' => $sk
        ]);
    }

    // devisi bagian
    public function indexDevisi(){
        $sm = smModel::where('bagian_id', auth('bagian')->user()->id)->where('aktivitas', 4)->OrWhere('aktivitas', 5)->where('tgl_arsip', NULL)->get();
        
        return view('devisi.surat-masuk.sm-devisi', [
            'data' => $sm,
            
        ]);
    }

    public function detailDevisi($id){
        $sm =smModel::with('bagianRelasi')->FindOrFail($id);
        return view('devisi.surat-masuk.sm-devisi-detail', [
            'data' => $sm
        ]);
    }

    public function arsipDevisi(Request $request, $id){
        $sm = smModel::FindOrFail($id);
        $request['catatan_bagian'] = $request->catatan_bagian;
        $request['aktivitas'] = 5;
        $sm->update($request->all());
        if($sm){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Ajukan arsip berhasil !!');
        }
        return redirect('/sm-devisi');
    }

    public function indexArsipDevisi(){
        $sm = smModel::whereNotNull('tgl_arsip')->Where('bagian_id', auth('bagian')->user()->id)->get();
        return view('devisi.arsip.sm-arsip', [
            'data' => $sm
        ]);
    }

    public function detailArsipDevisi($id){
        $sm = smModel::FindOrFail($id);
        return view('devisi.arsip.sm-arsip-detail', [
            'data' => $sm
        ]);
    }

   
}
