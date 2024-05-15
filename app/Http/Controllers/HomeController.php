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
        return view('home', ['products' => $phones, 'type' => 'phone']);
    }

    public function showPhones()
    {
        $phones = Phone::all();
        return view('home', ['products' => $phones, 'type' => 'phone']);
    }

    public function showLaptops()
    {
        $laptops = Laptop::all();
        return view('home', ['products' => $laptops, 'type' => 'laptop']);
    }

    public function showDesktops()
    {
        $desktops = Desktop::all();
        return view('home', ['products' => $desktops, 'type' => 'desktop']);
    }

    public function showMice()
    {
        $mice = Mouse::all();
        return view('home', ['products' => $mice, 'type' => 'mouse']);
    }

    public function showEarphones()
    {
        $earphones = Earphone::all();
        return view('home', ['products' => $earphones, 'type' => 'earphone']);
    }

    public function showScreens()
    {
        $screens = Screen::all();
        return view('home', ['products' => $screens, 'type' => 'screen']);
    }
}
