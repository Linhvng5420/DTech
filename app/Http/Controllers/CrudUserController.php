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
            'avatar' => 'required|image|mimes:jpeg,png|max:6144',
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

    // List
    public function listUser()
    {
        if (Auth::check()) {
            // Phân trang với 3 người dùng trên mỗi trang
            $users = User::paginate(3);
            return view('crud.list', ['users' => $users]);
        }

        return redirect("login")->withSuccess('Lổi truy cập!');
    }

    // View
    public function viewUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud.view', ['user' => $user]);
    }

    // Update
    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);
        return view('crud.update', ['user' => $user]);
    }

    public function postUpdateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $user_id,
            'newpassword1' => 'required|min:4',
            'newpassword2' => 'required|min:4|same:newpassword1', // xác thực p2=p1
            'image' => 'image|mimes:jpeg,png|max:6048',
        ]);

        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('newpassword1'));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/avatar');
            $image->move($destinationPath, $imageName);
            $user->profile_image = '/uploads/avatar' . $imageName;
        }

        $user->save();

        return redirect("list")->withSuccess('Đã cập nhật');
    }

    // Delete
    public function deleteUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect()->route('users.list')->with('status', 'Đã Xóa User! ID: ' . $user_id);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')->with('success', 'Đăng xuất thành công');
    }
}
