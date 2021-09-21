<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\Category;
use App\Models\Product;
use illuminate\Support\Facades\Auth;
use App\Models\Cart;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::with('children')->whereNull('parent_id')->where('featured', 0)->get();
        $trending = Category::with('children')->whereNull('parent_id')->where('featured', 1)->get();
        $products = Product::all();
        return view('front.index', compact('categories', 'products', 'trending'));
    }

    // add to cart here

    public function addProduct(Request $request)
    {
        $user = Auth::user();
        $product = Product::find($request->product_id);
        if (!$product) {
            return response()->json(["error" => "Product not found"], 404);
        }
        $checkCart = Cart::whereProductId($product->id)->whereUserId($user->id)->first();
        if ($checkCart) {
            return response()->json(["message" => "Item already in your cart "]);
        }
        $cart = Cart::create([
            "user_id" => $user->id,
            "product_id" => $product->id
        ]);
        return response()->json(["message" => "Product added to cart successfully"], 200);
    }

    // end of add to cart

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
