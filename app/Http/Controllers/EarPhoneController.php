<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EarPhoneController extends Controller
{
    // Add Earphone
    public function addEarphone(Request $request)
    {
        $product = new Product();
        $product->MaSP = $request->input('MaSP');
        $product->TenSP = $request->input('TenSP');
        $product->MauSac = $request->input('MauSac');
        $product->Gia = $request->input('Gia');
        $product->MieuTa = $request->input('MieuTa');
        $product->HinhAnh = $request->input('HinhAnh');
        $product->Hang = $request->input('Hang');
        $product->save();

        return redirect('/products');
    }


}
