<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Size;
use App\Models\User;
use SebastianBergmann\LinesOfCode\Counter;

class DashboardController extends Controller
{
    public function dashboard(){
        $categories = Category::all()->take(10);
        $brands = Brand::all()->take(10);
        $sizes = Size::all()->take(10);
        $users = User::all()->take(10);
        $products = Product::all()->take(10);
        return view('admin.dashboard',
        compact('categories', 'brands', 'sizes', 'users', 'products'));
    }
}
