<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('dashboard.auth.login');
    }
    public function login(LoginRequest $request)
    {
        try {
            $remember = $request->remember_me ? true : false;

            $user = Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember);
            if ($user) {
                return redirect()->route('admin.home');
            }
            return back()->withInput($request->only('email', 'remember_me'))->with('danger', 'wrong credintial');
        } catch (\Throwable $th) {
            return back()->with('danger', 'somthing wrong please try again later');
        }

    }
    public function logout()
    {
        try {
            Auth::logout();
            return redirect('/admin/login')->with('success', 'logout successfully');
            ;
        } catch (\Throwable $th) {
            return back()->with('danger', 'somthing wrong please try again later');
        }
    }
}
