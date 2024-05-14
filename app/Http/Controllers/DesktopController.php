<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desktop;

class DesktopController extends Controller
{
    public function create()
    {
        return view('desktop.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('HinhAnh')) {
            $filename = $request->HinhAnh->getClientOriginalName();

            $request->HinhAnh->storeAs('public/images', $filename);

            $data['HinhAnh'] = $filename;
        }

        Desktop::create($data);

        return back()->with('success', '[OK] Desktop mới đã được thêm thành công!');
    }
}
