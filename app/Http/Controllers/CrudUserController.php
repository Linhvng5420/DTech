<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrudUserController extends Controller
{

    // Đăng ký
    public function signup()
    {
        return view('crud.signup');
    }

    public function postUser(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password1' => 'required|min:4',
            'password2' => 'required|min:4|same:password1', // xác thực p2 = p1
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
        ]);

        $data = $request->all();

        // Avatar
        if ($request->hasFile('avatar')) {
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images'), $imageName);
            $data['profile_image'] = $imageName;
        }

        try {
            User::create([
                'username' => $data['username'],
                'email' => $data['email'],
                'profile_image' => isset($data['profile_image']) ? $data['profile_image'] : null,
                'password' => Hash::make($data['password1'])
            ]);

            return redirect("login")->withSuccess('Đăng ký thành công');
        } catch (\Exception $e) {
            return redirect("register")->withErrors(['error' => 'Đăng ký thất bại!']);
        }
    }

    // Đăng Nhập
    public function login()
    {
        return view('crud.login');
    }

    public function authUser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('Đăng nhập thành công');
        }

        return redirect("login")->withErrors(['error' => 'Đăng Nhập Thất Bại!']);
    }
}
