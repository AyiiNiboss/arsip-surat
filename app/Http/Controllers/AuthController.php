<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view('login.login');
    }

    public function proses(Request $request){
        $credential = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::guard('web')->attempt($credential)) {
            // Login berhasil untuk tabel 'users'
            return redirect()->intended('/dashboard');
        } elseif (Auth::guard('bagian')->attempt($credential)) {
            // Login berhasil untuk tabel 'admins'
            return redirect()->intended('/dashboard');
        } else {
            Session::flash('status', 'failed');
            Session::flash('pesan', 'Gagal Login!! Username atau password salah');
            return redirect('/login');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function index(){
        $user = User::get();
        return view('pengguna sistem.user', [
            'data' => $user
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ], [
            'username.unique' => 'Tambah User Gagal!! username yang sama telah terdaftar'
        ]);
        $request['name'] = $request->name;
        $request['username'] = $request->username;
        $request['password'] = Hash::make($request->password);
        $request['rules_id'] = '1';

        $register = User::create($request->all());
        if($register){
            Session::flash('status', 'success');
            Session::flash('pesan', 'User berhasil ditambah');
        }
        return redirect('/user');
    }

    public function edit($id){
        $user = User::FindOrFail($id);
        $password = $user->password;
        $hashedPassword = bcrypt($password);
        return view('pengguna sistem.user-edit', [
            'data' => $user,
            'password' => $hashedPassword
        ]);
    }

    public function update(Request $request, $id){
        $user = User::FindOrFail($id);
        $user->update($request->all());
        if($user){
            Session::flash('status', 'success');
            Session::flash('pesan', 'User berhasil diedit !!');
        }
        return redirect('/user');
    }

    public function delete($id){
        $user = User::FindOrFail($id);
        $user->delete();
        if($user){
            Session::flash('status', 'success');
            Session::flash('pesan', 'User berhasil dihapus !!');
        }
        return redirect('/user');
    }

    public function passwordWeb(Request $request, $id){
        $user = User::FindOrFail($id);
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
