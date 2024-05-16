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

        // Hợp nhất tất cả các sản phẩm thành một bộ sưu tập
        $products = collect();
        $products = $products->merge($phones)
            ->merge($laptops)
            ->merge($desktops)
            ->merge($mice)
            ->merge($earphones)
            ->merge($screens);

        // Sắp xếp theo thời gian tạo mới nhất
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

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Lấy dữ liệu từ tất cả các bảng
        $phones = Phone::where('TenSP', 'LIKE', '%' . $query . '%')->get();
        $laptops = Laptop::where('TenSP', 'LIKE', '%' . $query . '%')->get();
        $desktops = Desktop::where('TenSP', 'LIKE', '%' . $query . '%')->get();
        $mice = Mouse::where('TenSP', 'LIKE', '%' . $query . '%')->get();
        $earphones = Earphone::where('TenSP', 'LIKE', '%' . $query . '%')->get();
        $screens = Screen::where('TenSP', 'LIKE', '%' . $query . '%')->get();

        // Hợp nhất tất cả các sản phẩm tìm kiếm được thành một bộ sưu tập
        $products = collect();
        $products = $products->merge($phones)
            ->merge($laptops)
            ->merge($desktops)
            ->merge($mice)
            ->merge($earphones)
            ->merge($screens);

        // Sắp xếp theo thời gian tạo mới nhất
        $products = $products->sortByDesc('created_at')->values();

        // Tạo phân trang 6 cho products
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 6;
        $currentPageItems = $products->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentPageItems, $products->count(), $perPage);
        $paginatedItems->setPath(request()->url());

        return view('home', ['products' => $paginatedItems, 'type' => 'products']);
    }

    public function showProductDetail($productType, $id)
    {
        $productModel = null;

        switch ($productType) {
            case 'phone':
                $productModel = Phone::class;
                break;
            case 'laptop':
                $productModel = Laptop::class;
                break;
            case 'desktop':
                $productModel = Desktop::class;
                break;
            case 'mouse':
                $productModel = Mouse::class;
                break;
            case 'earphone':
                $productModel = Earphone::class;
                break;
            case 'screen':
                $productModel = Screen::class;
                break;
            default:
                return redirect()->back()->with('message', 'Loại sản phẩm không hợp lệ');
        }

        // Tìm kiếm sản phẩm dựa trên ID và model đã xác định
        $product = $productModel::find($id);

        if ($product) {
            return view('productsview', compact('product', 'productType'));
        } else {
            return redirect()->back()->with('message', 'Sản phẩm không tồn tại');
        }
    }
}
