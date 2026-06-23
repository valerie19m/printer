<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $req) {
        $user = User::create([
    'name' => $req->username,
    'email' => $req->email,
    'password' => Hash::make($req->password),
]);

        Auth::login($user);
        return redirect('/');
    }

    public function login(Request $req) {
        if (Auth::attempt([
    'email' => $req->email,
    'password' => $req->password
]);) {
            return redirect('/');
        }

        return back()->withErrors(['Invalid login']);
    }

    public function logout(Request $request) {
         $request->session()->forget('editMode');
        Auth::logout();
     $request->session()->invalidate();
    $request->session()->regenerateToken();

        return redirect('/');
    }
}
