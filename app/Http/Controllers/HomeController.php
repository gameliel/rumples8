<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::all();
        return view('front.index', compact('categories', 'products'));
    }
    public function about(){
        return view('about');
    }
    public function delivery(){
        return view('delivery');
    }
    public function terms(){
        return view('terms');
    }
    public function faq(){
        return view('faq');
    }
    public function returns(){
        return view('returns');
    }
}
