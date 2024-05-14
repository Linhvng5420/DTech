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
        EarPhone::create($request->all());

        return redirect()->back()->with('success', 'Sản phẩm EarPhone đã được thêm thành công!');
    }
}
