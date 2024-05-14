<?php

namespace App\Http\Controllers;
use App\Models\Laptop;
use App\Models\Phone;
use App\Models\Desktop;

use Illuminate\Http\Request;

class ListProductsController extends Controller
{
    public function showNavListProducts()
    {
        return view('navlistproducts');
    }

    public function index()
    {
        $phones = Phone::paginate(10); // Adjust pagination as needed
        return view('listproducts', compact('phones'));
    }
}
