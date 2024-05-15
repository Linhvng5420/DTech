<?php

namespace App\Http\Controllers;

use App\Models\LapTop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ControllerLapTop extends Controller
{
    ////CRUD

    public function add()
    {
        return view('laptop.add'); // Đảm bảo tên view là 'laptop.add'
    }
    public function store(Request $request)
    {
        $laptop = new LapTop();
        $laptop->TenSP = $request->input('TenSP');
        $laptop->MauSac = $request->input('MauSac');
        $laptop->Gia = $request->input('Gia');
        $laptop->Ram = $request->input('Ram');
        $laptop->Rom = $request->input('Rom');
        $laptop->Hang = $request->input('Hang');
        $laptop->MieuTa = $request->input('MieuTa', '');
        //
        if ($request->hasFile('HinhAnh')) {
            $file = $request->file('HinhAnh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/phone/', $filename);
            $laptop->HinhAnh = $filename;
        }
        $laptop->save();
        return redirect()->back()->with('status', 'Thêm laptop Thành công!');
    }

}
