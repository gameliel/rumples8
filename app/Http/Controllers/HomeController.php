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
        $categories = Category::with('children')->whereNull('parent_id')->where('featured', 0)->get();
        $trending = Category::with('children')->whereNull('parent_id')->where('featured', 1)->get();
        return view('front.detail', compact('product', 'categories', 'trending'));
    }
    public function about(){
        $categories = Category::with('children')->whereNull('parent_id')->where('featured', 0)->get();
        $trending = Category::with('children')->whereNull('parent_id')->where('featured', 1)->get();
        return view('front.about', compact('categories', 'trending'));
    }
    public function delivery(){
        $categories = Category::with('children')->whereNull('parent_id')->where('featured', 0)->get();
        $trending = Category::with('children')->whereNull('parent_id')->where('featured', 1)->get();
        return view('front.delivery', compact('categories', 'trending'));
    }
    public function terms(){
        $categories = Category::with('children')->whereNull('parent_id')->where('featured', 0)->get();
        $trending = Category::with('children')->whereNull('parent_id')->where('featured', 1)->get();
        return view('front.terms', compact('categories', 'trending'));
    }
    public function faq(){
        $categories = Category::with('children')->whereNull('parent_id')->where('featured', 0)->get();
        $trending = Category::with('children')->whereNull('parent_id')->where('featured', 1)->get();
        return view('front.faq', compact('categories', 'trending'));
    }
    public function returns(){
        $categories = Category::with('children')->whereNull('parent_id')->where('featured', 0)->get();
        $trending = Category::with('children')->whereNull('parent_id')->where('featured', 1)->get();
        return view('front.returns', compact('categories', 'trending'));
    }

    public function viewcategory($slug){
        $categories = Category::with('children')->whereNull('parent_id')->where('featured', 0)->get();
        $trending = Category::with('children')->whereNull('parent_id')->where('featured', 1)->get();

        if(Category::where('slug', $slug)->exists())
        {
           $cate = Category::where('slug', $slug)->first();
           $products = Product::where('category_id', $cate->id)->where('featured', 1)->get();

           return view('front.cate_detail', compact('categories', 'trending', 'cate', 'products'));
        }
        else
        {
            return redirect('/')->with('status', 'slug does not exist');
        }
    }
}
