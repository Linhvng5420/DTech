<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PhoneController extends Controller
{
    ////CRUD

    public function addphone(Request $request)
    {
        // Logic để thêm phone mới
        return view('phone.create');
    }
    public function store(Request $request)
    {
        $phone = new Phone();
        $phone->TenSP = $request->input('TenSP');
        $phone->MauSac = $request->input('MauSac');
        $phone->Gia = $request->input('Gia');
        $phone->Ram = $request->input('Ram');
        $phone->Rom = $request->input('Rom');
        $phone->Hang = $request->input('Hang');
        $phone->MieuTa = $request->input('MieuTa', '');
        //
        if ($request->hasFile('HinhAnh')) {
            $file = $request->file('HinhAnh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/phone/', $filename);
            $phone->HinhAnh = $filename;
        }
        $phone->save();
        return redirect()->back()->with('status', 'Thêm Phone Thành công!');
    }


    public function update(Request $request, $id)
    {
        $phone = Phone::find($id);
        $phone->TenSP = $request->input('TenSP');
        $phone->MauSac = $request->input('MauSac');
        $phone->Gia = $request->input('Gia');
        $phone->Ram = $request->input('Ram');
        $phone->Rom = $request->input('Rom');
        $phone->Hang = $request->input('Hang');
        $phone->MieuTa = $request->input('MieuTa', '');// Đặt giá trị mặc định nếu không có giá trị được cung cấp

        if ($request->hasFile('HinhAnh')) {
            $anhcu = 'uploads/phone/' . $phone->HinhAnh;
            if (File::exists($anhcu)) {
                File::delete($anhcu);
            }
            $file = $request->file('HinhAnh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/phone/', $filename);
            $phone->HinhAnh = $filename;
        }

        $phone->save();
        return redirect()->back()->with('status', 'Cập nhật Sản phẩm Thành Công!');
    }

    public function index()
    {
        $phones = Phone::all(); // Đặt tên biến là $phones
        return view('phone.index', compact('phones'));
    }

    public function edit($id)
    {
        $phone = Phone::find($id);
        return view('phone.edit', compact('phone'));
    }


    public function delete($id)
    {
        $phone = Phone::find($id);
        if (!$phone) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        $hinhanh = 'uploads/phone/' . $phone->HinhAnh;
        if (File::exists($hinhanh)) {
            File::delete($hinhanh);
        }
        $phone->delete();
        return redirect()->back()->with('status', 'Xóa sản phẩm thành công');
    }
}
