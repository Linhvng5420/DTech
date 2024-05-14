<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EarPhone;

class EarPhoneController extends Controller
{
    // Hiển thị form thêm sản phẩm
    public function create()
    {
        return view('earphones.create');
    }

    // Lưu sản phẩm mới
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('HinhAnh')) {
            $filename = $request->HinhAnh->getClientOriginalName();

            $request->HinhAnh->storeAs('public/images', $filename);

            $data['HinhAnh'] = $filename;
        }

        EarPhone::create($data);

        return redirect()->back()->with('success', '==> Sản phẩm EarPhone đã được thêm thành công!');
    }
}
