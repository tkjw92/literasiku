<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = UserModel::where('username', $request->username)->where('password', $request->password);
        if ($user->count() > 0) {
            $user = $user->first();
            session(['cred' => ['username' => $user->username, 'name' => $user->first_name]]);
        }

        return back();
    }

    public function register(Request $request)
    {
        $email = UserModel::where('email', $request->email)->count();
        $username = UserModel::where('username', $request->username)->count();
        $code = uniqid();

        if ($email > 0) {
            return back()->withErrors('Email yang anda masukkan telah terdaftar');
        }

        if ($username > 0) {
            return back()->withErrors('Username yang anda gunakan telah terdaftar');
        }

        Mail::to($request->email)->send(new RegisterMail($code));

        UserModel::insert([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'verify' => $code
        ]);

        return redirect('/login')->with('notification', 'Berhasil melakukan pendaftaran silahkan aktivasi email anda');
    }

    public function verify()
    {
        if (isset($_GET['code'])) {
            $code = base64_decode($_GET['code']);

            $user = UserModel::where('verify', $code);
            if ($user->count() > 0) {
                $user->update(['verify' => 'activated']);
                session()->flush();
                return redirect('/login')->with('notification', 'Berhasil melakukan verifikasi email');
            }
        }
        return view('pages.verify');
    }
}
