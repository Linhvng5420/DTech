<?php

namespace App\Http\Controllers;

use App\Models\Desktop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DesktopConTroller extends Controller
{
    ////CRUD

    public function adddesktop(Request $request)
    {
        // Logic để thêm desktop mới
        return view('desktop.create');
    }
    public function store(Request $request)
    {
        $desktop = new Desktop();
        $desktop->TenSP = $request->input('TenSP');
        $desktop->MauSac = $request->input('MauSac');
        $desktop->Gia = $request->input('Gia');
        $desktop->Ram = $request->input('Ram');
        $desktop->Rom = $request->input('Rom');
        $desktop->Hang = $request->input('Hang');
        $desktop->MieuTa = $request->input('MieuTa', '');
        //
        if ($request->hasFile('HinhAnh')) {
            $file = $request->file('HinhAnh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/desktop/', $filename);
            $desktop->HinhAnh = $filename;
        }
        $desktop->save();
        return redirect()->back()->with('status', 'Thêm desktop Thành công!');
    }


    public function update(Request $request, $id)
    {
        $desktop = Desktop::find($id);
        $desktop->TenSP = $request->input('TenSP');
        $desktop->MauSac = $request->input('MauSac');
        $desktop->Gia = $request->input('Gia');
        $desktop->Ram = $request->input('Ram');
        $desktop->Rom = $request->input('Rom');
        $desktop->Hang = $request->input('Hang');
        $desktop->MieuTa = $request->input('MieuTa', ''); // Đặt giá trị mặc định nếu không có giá trị được cung cấp

        if ($request->hasFile('HinhAnh')) {
            $anhcu = 'uploads/desktop/' . $desktop->HinhAnh;
            if (File::exists($anhcu)) {
                File::delete($anhcu);
            }
            $file = $request->file('HinhAnh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/desktop/', $filename);
            $desktop->HinhAnh = $filename;
        }

        $desktop->save();
        return redirect()->back()->with('status', 'Cập nhật Sản phẩm Thành Công!');
    }

    public function index()
    {
        $desktops = Desktop::orderBy('Gia', 'asc')->paginate(3); // Số lượng sản phẩm mỗi trang là 10, bạn có thể thay đổi số này nếu cần
        return view('desktop.index', compact('desktops'));
    }

    public function edit($id)
    {
        $desktop = Desktop::find($id);
        return view('desktop.edit', compact('desktop'));
    }


    public function delete($id)
    {
        $desktop = Desktop::find($id);
        if (!$desktop) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        $hinhanh = 'uploads/desktop/' . $desktop->HinhAnh;
        if (File::exists($hinhanh)) {
            File::delete($hinhanh);
        }
        $desktop->delete();
        return redirect()->back()->with('status', 'Xóa sản phẩm thành công');
    }
}
