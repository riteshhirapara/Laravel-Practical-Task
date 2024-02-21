<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\admin;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function login()
    {
        return view('Admin.Auth.login');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
                return redirect()->route('panel.dashboard');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('panel.auth.login');
    }
}
