<?php

namespace App\Http\Controllers;

use App\Models\Screen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ScreenController extends Controller
{
    // Hiển Thị
    public function indexScreen()
    {
        $screens = Screen::paginate(3);
        return view('screen.index', compact('screens'));
    }

    // Thêm
    public function addScreen()
    {
        return view('screen.create');
    }

    // Store
    public function storeScreen(Request $request)
    {
        $request->validate([
            'TenSP' => 'required',
            'HinhAnh' => 'image|mimes:jpg,png|max:4096',
            'MauSac' => 'required',
            'Gia' => 'required|numeric',
            'KichThuoc' => 'required|numeric',
            'MieuTa' => 'required',
            'Hang' => 'required',
        ]);

        $screen = new Screen();
        $screen->TenSP = $request->input('TenSP');
        $screen->MauSac = $request->input('MauSac');
        $screen->Gia = $request->input('Gia');
        $screen->KichThuoc = $request->input('KichThuoc');
        $screen->MieuTa = $request->input('MieuTa', '');
        $screen->Hang = $request->input('Hang');

        if ($request->hasFile('HinhAnh')) {
            $file = $request->file('HinhAnh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/screen/', $filename);
            $screen->HinhAnh = $filename;
        }

        $screen->save();
        return redirect()->route('admin.screen.index')->with('status', 'Thêm Screen thành công!');
    }

    // Sửa
    public function editScreen($id)
    {
        $screen = Screen::find($id);
        return view('screen.edit', compact('screen'));
    }

    public function updateScreen(Request $request, $id)
    {
        $request->validate([
            'TenSP' => 'required',
            'HinhAnh' => 'image|mimes:jpg,png|max:4096',
            'MauSac' => 'required',
            'Gia' => 'required|numeric',
            'KichThuoc' => 'required|numeric',
            'MieuTa' => 'required',
            'Hang' => 'required',
        ]);

        $screen = Screen::find($id);
        if (!$screen) {
            return redirect()->route('admin.screen.index')->with('error', 'Sản phẩm không tồn tại.');
        }

        $screen->TenSP = $request->input('TenSP');
        $screen->MauSac = $request->input('MauSac');
        $screen->Gia = $request->input('Gia');
        $screen->KichThuoc = $request->input('KichThuoc');
        $screen->MieuTa = $request->input('MieuTa', '');
        $screen->Hang = $request->input('Hang');

        if ($request->hasFile('HinhAnh')) {
            $oldImage = 'uploads/screen/' . $screen->HinhAnh;
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
            $file = $request->file('HinhAnh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/screen/', $filename);
            $screen->HinhAnh = $filename;
        }

        $screen->save();
        return redirect()->route('admin.screen.index')->with('status', 'Cập nhật Sản phẩm thành công!');
    }

    // Xóa
    public function deleteScreen($id)
    {
        $screen = Screen::find($id);
        if (!$screen) {
            return redirect()->back()->with('error', 'Không tồn tại sản phẩm');
        }

        $hinhanh = 'uploads/screen/' . $screen->HinhAnh;
        if (File::exists($hinhanh)) {
            File::delete($hinhanh);
        }

        $screen->delete();
        return redirect()->route('admin.screen.index')->with('status', 'Đã xóa sản phẩm');
    }
}

