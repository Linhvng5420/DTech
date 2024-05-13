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
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password1' => 'required|min:4',
            'password2' => 'required|min:4|same:password1', // xác thực p2=p1
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:6144', // Validation for image
        ]);

        $data = $request->all();

        // Avatar upload
        $imagePath = null;
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imagePath = $image->store('public/images');
        }

        $check = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password1']),
            'profile_image' => $imagePath,
        ]);

        return redirect("login")->withSuccess('Đăng Ký thành công');
    }

}
