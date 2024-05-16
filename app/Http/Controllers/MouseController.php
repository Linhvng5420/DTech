<?php

namespace App\Http\Controllers;

use App\Models\Mouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MouseController extends Controller
{
    // Hiển Thị
    public function indexMouses()
    {
        $mouses = Mouse::paginate(3);
        return view('mouse.index', compact('mouses'));
    }

    // Thêm
    public function addMouses()
    {
        return view('mouse.create');
    }

    // Store
    public function storeMouses(Request $request)
    {
        $request->validate([
            'TenSP' => 'required',
            'HinhAnh' => 'image|mimes:jpg,png|max:4096',
            'MauSac' => 'required',
            'Gia' => 'required|numeric',
            'MieuTa' => 'required',
            'Hang' => 'required',
        ]);

        $mouse = new Mouse();
        $mouse->TenSP = $request->input('TenSP');
        $mouse->MauSac = $request->input('MauSac');
        $mouse->Gia = $request->input('Gia');
        $mouse->MieuTa = $request->input('MieuTa', '');
        $mouse->Hang = $request->input('Hang');

        if ($request->hasFile('HinhAnh')) {
            $file = $request->file('HinhAnh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/mouse/', $filename);
            $mouse->HinhAnh = $filename;
        }

        $mouse->save();
        return redirect()->route('admin.mouse.index')->with('status', 'Thêm Mouse thành công!');
    }

    // Sửa
    public function editMouses($id)
    {
        $mouse = Mouse::find($id);
        return view('mouse.edit', compact('mouse'));
    }

    public function updateMouses(Request $request, $id)
    {
        $request->validate([
            'TenSP' => 'required',
            'HinhAnh' => 'image|mimes:jpg,png|max:4096',
            'MauSac' => 'required',
            'Gia' => 'required|numeric',
            'MieuTa' => 'nullable',
            'Hang' => 'required',
        ]);

        $mouse = Mouse::find($id);
        if (!$mouse) {
            return redirect()->route('admin.mouse.index')->with('error', 'Sản phẩm không tồn tại.');
        }

        $mouse->TenSP = $request->input('TenSP');
        $mouse->MauSac = $request->input('MauSac');
        $mouse->Gia = $request->input('Gia');
        $mouse->MieuTa = $request->input('MieuTa', '');
        $mouse->Hang = $request->input('Hang');

        if ($request->hasFile('HinhAnh')) {
            $oldImage = 'uploads/mouse/' . $mouse->HinhAnh;
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
            $file = $request->file('HinhAnh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/mouse/', $filename);
            $mouse->HinhAnh = $filename;
        }

        $mouse->save();
        return redirect()->route('admin.mouse.index')->with('status', 'Cập nhật Sản phẩm thành công!');
    }

    // Xóa
    public function deleteMouses($id)
    {
        $mouse = Mouse::find($id);
        if (!$mouse) {
            return redirect()->back()->with('error', 'Không tồn tại sản phẩm');
        }

        $hinhanh = 'uploads/mouse/' . $mouse->HinhAnh;
        if (File::exists($hinhanh)) {
            File::delete($hinhanh);
        }
        $mouse->delete();
        return redirect()->route('admin.mouse.index')->with('status', 'Đã xóa sản phẩm');
    }
}

