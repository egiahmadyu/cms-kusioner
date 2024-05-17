<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class AuthController extends Controller
{
  public function index()
  {
    return view('auth.login');
  }
  
  public function login_process(Request $request)
  {
    if (Auth::attempt(['username' => $request->username, 'password' => $request->pass])) {
      $request->session()->regenerate();
      // if ($request->pass == '123456') {
      //     $data = [
      //         'redirect' => '/change-password'
      //     ];
      //     return $this->response_json(200, 'Password Masih Default, akan di arahkan ke halaman ganti password', $data);
      // }
      $redirect = '/pengacara';
      $data = [
        'redirect' => $redirect
      ];
      return $this->response_json(200, 'Login Berhasil', $data);
    }

    return $this->response_json(401, 'Username / Password Salah', []);
  }

  public function logout()
  {
    FacadesSession::flush();
    auth()->logout();
    return redirect('/login');
  }
}
