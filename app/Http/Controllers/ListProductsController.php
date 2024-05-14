<?php

namespace App\Http\Controllers;
use App\Models\Laptop;
use App\Models\Phone;

use Illuminate\Http\Request;

class ListProductsController extends Controller
{
    public function showProducts() {
        $laptops = Laptop::paginate(5);
//        return view('listproducts', compact('laptops'));

        $phones = Phone::paginate(5);
        return view('listproducts', compact('phones', 'laptops'));
    }
}
