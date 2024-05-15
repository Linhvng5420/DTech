<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function toLogin()
    {
        return view('auth.login');
    }

    public function signout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login')->with('success', 'Đăng xuất thành công');
    }

    public function checkUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Kiểm tra vai trò của người dùng
            switch ($user->role) {
                case 'admin':
                    return redirect()->intended('manager')->with('success', 'Đăng nhập thành công với quyền admin');
                case 'user':
                    return redirect()->intended('home')->with('success', 'Đăng nhập thành công');
                default:
                    return redirect('login')->withErrors(['login_fail' => 'Đăng nhập thất bại']);
            }
        }

        return redirect('login')->withErrors(['login_fail' => 'Đăng nhập thất bại']);
    }

    public function gohome(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            return view('home');
        }

        // Nếu người dùng chưa đăng nhập
        return redirect('login')->withErrors(['access_denied' => 'Bạn không được phép truy cập']);
    }

    public function gomanager(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            return view('manager');
        }

        // Nếu người dùng chưa đăng nhập
        return redirect('login')->withErrors(['access_denied' => 'Bạn không được phép truy cập']);
    }
}
