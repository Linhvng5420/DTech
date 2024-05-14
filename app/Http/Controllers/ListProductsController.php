<?php

namespace App\Http\Controllers;
use App\Models\Laptop;

use Illuminate\Http\Request;

class ListProductsController extends Controller
{
    public function showLaptops() {
        $laptops = Laptop::paginate(5);
        return view('listproducts', compact('laptops'));
    }


}
