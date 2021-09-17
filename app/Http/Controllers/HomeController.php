<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::with('children')->whereNull('parent_id')->where('featured', 0)->get();
        $trending = Category::with('children')->whereNull('parent_id')->where('featured', 1)->get();
        $products = Product::all();
        return view('front.index', compact('categories', 'products', 'trending'));
    }

    public function detail($id)
    {
        $product = Product::find($id);
        return view('front.detail', compact('product'));
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
