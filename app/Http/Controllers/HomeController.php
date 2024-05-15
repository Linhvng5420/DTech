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
        $phones = Phone::paginate(5);
        return view('home', ['products' => $phones, 'type' => 'phone']);
    }

    public function showPhones()
    {
        $phones = Phone::paginate(5);
        return view('home', ['products' => $phones, 'type' => 'phone']);
    }

    public function showLaptops()
    {
        $laptops = Laptop::paginate(5);
        return view('home', ['products' => $laptops, 'type' => 'laptop']);
    }

    public function showDesktops()
    {
        $desktops = Desktop::paginate(5);
        return view('home', ['products' => $desktops, 'type' => 'desktop']);
    }

    public function showMice()
    {
        $mice = Mouse::paginate(5);
        return view('home', ['products' => $mice, 'type' => 'mouse']);
    }

    public function showEarphones()
    {
        $earphones = Earphone::paginate(5);
        return view('home', ['products' => $earphones, 'type' => 'earphone']);
    }

    public function showScreens()
    {
        $screens = Screen::paginate(5);
        return view('home', ['products' => $screens, 'type' => 'screen']);
    }
}
