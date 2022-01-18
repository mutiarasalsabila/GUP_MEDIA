<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'phone' => 'required|numeric|unique:users',
                'password' => 'required|confirmed',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('code', 'modalRegister');
        }

        // dd($request->all());

        $user = new User();
        $user->name = $request->name;
        $user->level = 'user';
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(60);

        $save = $user->save();

        if ($save) {
            Session::flash('success', 'Registrasi berhasil! Silakan login');
            return redirect()->back()->with('code', 'modalLogin');
        }
        Session::flash('error', 'Registrasi gagal');
        return redirect()->back()->withInput()->with('code', 'modalRegister');
    }

    public function login(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );

        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->level == 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->back();
        } elseif ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('code', 'modalLogin');
        }
        Session::flash('error', 'Email atau password salah');
        return redirect()->back()->withInput()->with('code', 'modalLogin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
