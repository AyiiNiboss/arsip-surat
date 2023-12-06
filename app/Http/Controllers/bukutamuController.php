<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bukutamuModel;
use Illuminate\Support\Facades\Session;

class bukutamuController extends Controller
{
    public function index(){
        $bt = bukutamuModel::all();
        return view('buku tamu.buku-tamu', [
            'data' => $bt
        ]);
    }

    public function store(Request $request){
        $bt = bukutamuModel::create($request->all());
        if($bt){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil ditambah');
        }
        return redirect('/buku-tamu');
    }

    public function edit($id){
        $bt = bukutamuModel::FindOrFail($id);
        return view('buku tamu.buku-tamu-edit', [
            'data' => $bt
        ]);
    }

    public function update(Request $request, $id){
        $bt = bukutamuModel::FindOrFail($id);
        $bt->update($request->all());
        if($bt){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil diubah');
        }
        return redirect('/buku-tamu');
    }

    public function delete($id){
        $bt = bukutamuModel::FindOrFail($id);
        $bt->delete();
        if($bt){
            Session::flash('status', 'success');
            Session::flash('pesan', 'Data berhasil dihapus');
        }
        return redirect('/buku-tamu');
    }

    public function arsip(){
        $bt = bukutamuModel::all();
        return view('arsip.buku-tamu', [
            'data' => $bt
        ]);
    }
}
