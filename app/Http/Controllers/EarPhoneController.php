<?php

namespace App\Http\Controllers;

use App\Models\EarPhone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EarPhoneController extends Controller
{
    public function addEarPhones(Request $request)
    {
        return view('earphone.create'); // Đảm bảo đúng tên view
    }

    public function storeEarPhones(Request $request)
    {
        $request->validate([
            'TenSP' => 'required',
            'MauSac' => 'required',
            'Gia' => 'required|numeric',
            'Hang' => 'required',
            'HinhAnh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate file
        ]);

        $earPhone = new EarPhone();
        $earPhone->TenSP = $request->input('TenSP');
        $earPhone->MauSac = $request->input('MauSac');
        $earPhone->Gia = $request->input('Gia');
        $earPhone->MieuTa = $request->input('MieuTa', '');
        $earPhone->Hang = $request->input('Hang');

        if ($request->hasFile('HinhAnh')) {
            $file = $request->file('HinhAnh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/earphone/', $filename);
            $earPhone->HinhAnh = $filename;
        }
        $earPhone->save();
        return redirect()->route('admin.earphone.index')->with('status', 'Thêm EarPhone thành công!');
    }

    public function updateEarPhones(Request $request, $id)
    {
        $request->validate([
            'TenSP' => 'required',
            'MauSac' => 'required',
            'Gia' => 'required|numeric',
            'Hang' => 'required',
            'HinhAnh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate file
        ]);

        $earPhone = EarPhone::find($id);
        $earPhone->TenSP = $request->input('TenSP');
        $earPhone->MauSac = $request->input('MauSac');
        $earPhone->Gia = $request->input('Gia');
        $earPhone->MieuTa = $request->input('MieuTa', '');
        $earPhone->Hang = $request->input('Hang');

        if ($request->hasFile('HinhAnh')) {
            $oldImage = 'uploads/earphone/' . $earPhone->HinhAnh;
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
            $file = $request->file('HinhAnh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/earphone/', $filename);
            $earPhone->HinhAnh = $filename;
        }

        $earPhone->save();
        return redirect()->route('admin.earphone.index')->with('status', 'Cập nhật Sản phẩm thành công!');
    }

    public function indexEarPhones()
    {
        $earphones = EarPhone::paginate(3);
        return view('earphone.index', compact('earphones'));
    }


    public function editEarPhones($id)
    {
        $earPhone = EarPhone::find($id);
        return view('earphone.edit', compact('earPhone'));
    }

    public function deleteEarPhones($id)
    {
        $earPhone = EarPhone::find($id);
        if (!$earPhone) {
            return redirect()->back()->with('error', 'Không tồn tại sản phẩm');
        }
        $hinhanh = 'uploads/earphone/' . $earPhone->HinhAnh;
        if (File::exists($hinhanh)) {
            File::delete($hinhanh);
        }
        $earPhone->delete();
        return redirect()->route('admin.earphone.index')->with('status', 'Đã xóa sản phẩm');
    }
}
