<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function auth(Request $request)
    {
        $validateData =
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
        if (Auth::attempt($validateData)) {
            if (Auth::user()->level == 1) {
                return view('/dosen/main_dsn');
            } else if (Auth::user()->level == 2) {
                return view('/mahasiswa/main_mhs');
            } else if (Auth::user()->level == 3) {
                return view('/admin/main_admin');
            }
        } else {
            return 'isWrong';
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
