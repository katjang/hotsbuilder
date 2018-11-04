<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function form()
    {
        return view('auth.admin.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    use AuthenticatesUsers;

    protected $redirectTo = '/admin/users';
}
