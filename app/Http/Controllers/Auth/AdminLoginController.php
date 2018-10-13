<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login', ['admin' => true]);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    use AuthenticatesUsers;

    protected $redirectTo = '/admin/users';
}
