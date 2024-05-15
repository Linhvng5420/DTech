<?php

namespace App\Http\Controllers;

use App\Models\LapTop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LaptopController extends Controller
{
    ////CRUD

    public function addlaptop(Request $request)
    {
        // Logic để thêm laptop mới
        return view('laptop.create');
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
            $file->move('uploads/laptop/', $filename);
            $laptop->HinhAnh = $filename;
        }
        $laptop->save();
        return redirect()->back()->with('status', 'Thêm laptop Thành công!');
    }


    public function update(Request $request, $id)
    {
        $laptop = LapTop::find($id);
        $laptop->TenSP = $request->input('TenSP');
        $laptop->MauSac = $request->input('MauSac');
        $laptop->Gia = $request->input('Gia');
        $laptop->Ram = $request->input('Ram');
        $laptop->Rom = $request->input('Rom');
        $laptop->Hang = $request->input('Hang');
        $laptop->MieuTa = $request->input('MieuTa', ''); // Đặt giá trị mặc định nếu không có giá trị được cung cấp

        if ($request->hasFile('HinhAnh')) {
            $anhcu = 'uploads/laptop/' . $laptop->HinhAnh;
            if (File::exists($anhcu)) {
                File::delete($anhcu);
            }
            $file = $request->file('HinhAnh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/laptop/', $filename);
            $laptop->HinhAnh = $filename;
        }

        $laptop->save();
        return redirect()->back()->with('status', 'Cập nhật Sản phẩm Thành Công!');
    }

    public function index()
    {
        $laptops = LapTop::orderBy('Gia', 'asc')->paginate(3); // Số lượng sản phẩm mỗi trang là 10, bạn có thể thay đổi số này nếu cần
        return view('laptop.index', compact('laptops'));
    }

    public function edit($id)
    {
        $laptop = LapTop::find($id);
        return view('laptop.edit', compact('laptop'));
    }


    public function delete($id)
    {
        $laptop = LapTop::find($id);
        if (!$laptop) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        $hinhanh = 'uploads/laptop/' . $laptop->HinhAnh;
        if (File::exists($hinhanh)) {
            File::delete($hinhanh);
        }
        $laptop->delete();
        return redirect()->back()->with('status', 'Xóa sản phẩm thành công');
    }
}
