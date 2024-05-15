<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
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
        // Lấy dữ liệu từ tất cả các bảng
        $phones = Phone::all();
        $laptops = Laptop::all();
        $desktops = Desktop::all();
        $mice = Mouse::all();
        $earphones = Earphone::all();
        $screens = Screen::all();

        // Hợp nhất tất cả các sản phẩm thành một
        $products = collect();
        $products = $products->merge($phones)
            ->merge($laptops)
            ->merge($desktops)
            ->merge($mice)
            ->merge($earphones)
            ->merge($screens);

        // Lấy tất cả brand của các sản phẩm hiện có
        $phoneBrands = Phone::select('Hang')->distinct()->pluck('Hang');
        $laptopBrands = Laptop::select('Hang')->distinct()->pluck('Hang');
        $desktopBrands = Desktop::select('Hang')->distinct()->pluck('Hang');
        $mouseBrands = Mouse::select('Hang')->distinct()->pluck('Hang');
        $earphoneBrands = Earphone::select('Hang')->distinct()->pluck('Hang');
        $screenBrands = Screen::select('Hang')->distinct()->pluck('Hang');

        $allBrands = $phoneBrands
            ->merge($laptopBrands)
            ->merge($desktopBrands)
            ->merge($mouseBrands)
            ->merge($earphoneBrands)
            ->merge($screenBrands)
            ->unique()
            ->values();

        // Sắp xếp theo thời gian tạo mới nhất (nếu có trường 'created_at')
        $products = $products->sortByDesc('created_at')->values();

        // Tạo phân trang 12 cho products
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 12;
        $currentPageItems = $products->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentPageItems, $products->count(), $perPage);
        $paginatedItems->setPath(request()->url());

        return view('home', ['products' => $paginatedItems, 'type' => 'products']);
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
