<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\Laptop;
use App\Models\Desktop;
use App\Models\Mouse;
use App\Models\Earphone;
use App\Models\Screen;

class HomeController extends Controller
{
    public function index()
    {
        $phones = Phone::all();
        $laptops = Laptop::all();
        $desktops = Desktop::all();
        $mice = Mouse::all();
        $earphones = Earphone::all();
        $screens = Screen::all();

        return view('home', compact('phones', 'laptops', 'desktops', 'mice', 'earphones', 'screens'));
    }
}
