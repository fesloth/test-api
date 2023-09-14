<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Redirect;

class SessionController extends Controller
{
    public function index()
    {
        return view('sesi/login');
    }
    public function login()
    {
        return view('sesi/login');
    }

    public function loginProses(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($data)) {
            return redirect('barang');
        } else {
            return redirect()->route('login')->with('failed', 'Username atau Password salah');
        }
    }

    public function register()
    {
        return view('sesi/register');
    }

    public function registerProses(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|unique:user|max:500',
            'password' => 'required',
            'confirm' => 'required|same:password'
        ]);

        if ($validateData) {
            $user = new User;
            $user->username = $validateData['username'];
            $user->password = Hash::make($validateData['password']);
            $user->save();

            return redirect()->route('login')->with('success', 'Registrasi berhasil! Silahkan login kembali.');
        } else {
            return redirect()->route('register')->with('failed', 'Konfirmasi Password tidak sesuai');
        }
    }


    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Registrasi berhasil');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout berhasil');
    }

    // public function logout()
    // {
    //     return view('sesi/confirm');
    // }

    // public function performLogout()
    // {
    //     Auth::logout();
    //     return redirect()->route('login')->with('success', 'Logout berhasil');
    // }
}
