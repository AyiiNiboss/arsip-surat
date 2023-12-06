<?php

namespace App\Http\Controllers;

use App\Models\BagianModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class BagianController extends Controller
{
    public function index(){
        $bagian = BagianModel::all();
        return view('bagian.bagian', [
            'data' => $bagian
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
        ], [
            'username.unique' => 'Tambah User Gagal!! username yang sama telah terdaftar'
        ]);
        $newname = '';
        if($request->hasFile('image')){
        $ektension = $request->file('image')->getClientOriginalExtension();
        $newname = $request->username.'-'.now()->timestamp.'.'.$ektension;
        $request->file('image')->storeAs('profil', $newname);
        }
        $request['foto'] = $newname;
        $request['nama_bagian'] = $request->nama_bagian;
        $request['username'] = $request->username;
        $request['password'] = Hash::make($request->password);
        $request['nama'] = $request->nama;
        $request['tempat_lahir'] = $request->tempat_lahir;
        $request['tgl_lahir'] = $request->tgl_lahir;
        $request['alamat'] = $request->alamat;
        $request['no_hp'] = $request->no_hp;
        
        $bagian = BagianModel::create($request->all());
        if($bagian){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil ditambah');
        }
        return redirect('/bagian');
    }

    public function detail($id){
        $bagian = BagianModel::FindOrFail($id);
        return view('bagian.bagian-detail', [
            'data' => $bagian
        ]);
    }

    public function update(Request $request, $id){
        $bagian = BagianModel::FindOrFail($id);
        if($request->hasFile('image')){
            $path = '../public/storage/profil/'.$bagian->username;
            if(File::exists($path)){
                File::delete($path);
            }
                $ektension = $request->file('image')->getClientOriginalExtension();
                $newname = $request->username.'-'.now()->timestamp.'.'.$ektension;
                $request->file('image')->storeAs('profil', $newname);
                $request['foto'] = $newname;
        }
        $bagian->update($request->all());
        if($bagian){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil diedit !!');
        }
        return redirect('/bagian');
    }

    public function delete($id){
        $bagian = BagianModel::FindOrFail($id);
            $path = '../public/storage/profil/'.$bagian->username;
            if(File::exists($path)){
                File::delete($path);
            }
        $bagian->delete();
        if($bagian){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil dihapus !!');
        }
        return redirect('/bagian');
    }

    public function passwordBagian(Request $request, $id){
        $user = BagianModel::FindOrFail($id);
        $password = $user->password;
        if( $request['password'] == ""){
            $request['password'] = $password;
        }else{

            $request['password'] = Hash::make($request->password);
        }
        $user->update($request->all());
        return redirect('/dashboard');
    }
}
