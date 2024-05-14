<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desktop;

class DesktopController extends Controller
{
    public function create()
    {
        return view('desktops.create');
    }

    public function store(Request $request)
    {
        Desktop::create($request->all());
        return back()->with('success', '[OK] Desktop mới đã được thêm thành công!');
    }
}
