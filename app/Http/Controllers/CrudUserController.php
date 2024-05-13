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
            'password2' => 'required|min:4|same:password1', // xác thực p2 = p1
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6144', // kiểm tra ảnh avatar
        ]);

        $data = $request->all();

        // Avatar upload
        if($request->hasFile('avatar')){
            $imageName = time().'.'.$request->avatar->extension();

            $request->avatar->move(public_path('images'), $imageName);

            $data['profile_image'] = $imageName;
        }

        $check = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'profile_image' => $data['profile_image'],
            'password' => Hash::make($data['password1'])
        ]);

        return redirect("#")->withSuccess('Đăng ký thành công');
    }

}
