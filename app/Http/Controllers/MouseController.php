<?php

namespace App\Http\Controllers;

use App\Models\Mouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MouseController extends Controller
{
    // Hiển Thị
    public function indexEarPhones()
    {
        $earphones = Mouse::paginate(3);
        return view('earphone.index', compact('earphones'));
    }

    // Thêm
    public function addEarPhones()
    {
        return view('earphone.create');
    }

    // Store
    public function storeEarPhones(Request $request)
    {
        $request->validate([
            'TenSP' => 'required',
            'HinhAnh' => 'image|mimes:jpg,png|max:4096',
            'MauSac' => 'required',
            'Gia' => 'required|numeric',
            'MieuTa' => 'required',
            'Hang' => 'required',
        ]);

        $earphone = new Mouse();
        $earphone->TenSP = $request->input('TenSP');
        $earphone->MauSac = $request->input('MauSac');
        $earphone->Gia = $request->input('Gia');
        $earphone->MieuTa = $request->input('MieuTa', '');
        $earphone->Hang = $request->input('Hang');

        if ($request->hasFile('HinhAnh')) {
            $file = $request->file('HinhAnh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/earphone/', $filename);
            $earphone->HinhAnh = $filename;
        }

        $earphone->save();
        return redirect()->route('admin.earphone.index')->with('status', 'Thêm Mouse thành công!');
    }

    // Sửa
    public function editEarPhones($id)
    {
        $earphone = Mouse::find($id);
        return view('earphone.edit', compact('earphone'));
    }

    public function updateEarPhones(Request $request, $id)
    {
        $request->validate([
            'TenSP' => 'required',
            'HinhAnh' => 'image|mimes:jpg,png|max:4096',
            'MauSac' => 'required',
            'Gia' => 'required|numeric',
            'MieuTa' => 'nullable',
            'Hang' => 'required',
        ]);

        $earphone = Mouse::find($id);
        if (!$earphone) {
            return redirect()->route('admin.earphone.index')->with('error', 'Sản phẩm không tồn tại.');
        }

        $earphone->TenSP = $request->input('TenSP');
        $earphone->MauSac = $request->input('MauSac');
        $earphone->Gia = $request->input('Gia');
        $earphone->MieuTa = $request->input('MieuTa', '');
        $earphone->Hang = $request->input('Hang');

        if ($request->hasFile('HinhAnh')) {
            $oldImage = 'uploads/earphone/' . $earphone->HinhAnh;
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
            $file = $request->file('HinhAnh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/earphone/', $filename);
            $earphone->HinhAnh = $filename;
        }

        $earphone->save();
        return redirect()->route('admin.earphone.index')->with('status', 'Cập nhật Sản phẩm thành công!');
    }

    // Xóa
    public function deleteEarPhones($id)
    {
        $earphone = Mouse::find($id);
        if (!$earphone) {
            return redirect()->back()->with('error', 'Không tồn tại sản phẩm');
        }

        $hinhanh = 'uploads/earphone/' . $earphone->HinhAnh;
        if (File::exists($hinhanh)) {
            File::delete($hinhanh);
        }
        $earphone->delete();
        return redirect()->route('admin.earphone.index')->with('status', 'Đã xóa sản phẩm');
    }
}

