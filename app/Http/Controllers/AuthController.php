<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    public function login(){
        return view('login');
    }

    public function login_proses(Request $request)
{
    $request->validate([
        'id_role' => 'required',
        'username' => 'required|email',
        'password_user' => 'required',
    ]);

    $user = User::whereHas('role', function ($query) use ($request) {
        $query->where('id_role', $request->id_role);
    })->where('username', $request->username)->first();

    if ($user && Hash::check($request->password_user, $user->password_user)) {
        Auth::login($user);

        switch ($user->id_role) {
            case 1:
                return redirect()->route('dashboard');
            case 2:
                return redirect()->route('data-barang');
            case 3:
                return redirect()->route('data-vendor');
            default:
                return redirect()->route('login');
        }
    }

    return redirect()->route('login');
}


public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    $session = DB::table('user_table')->where('id_user', $request->user()->id_user)->first();

    if ($session) {
        $session->delete();
    }

    return redirect()->route('login');
}

  
}
