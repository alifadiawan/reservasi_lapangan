<?php

namespace App\Http\Controllers;

use App\Models\lapangan;
use App\Models\reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){
        return view ('login');
    }

    

    public function authenticate(Request $request){
        $data=$request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
 
            return redirect()->intended(route('admin.index'));
        }
        return back()->withErrors('danger', 'Login anda gagal');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
