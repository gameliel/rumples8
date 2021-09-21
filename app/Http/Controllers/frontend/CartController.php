<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        // Correction
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

        // I DON'T KNOW WHAT YOUR DOING HERE OOOO.... IB
        // $product_id = $request->input('product_id');
        // $prod_check = Product::where('id', '$product_id')->exists();
        // dd($prod_check);
        // if (Auth::check()) {
        //     dd($prod_check);
        //     if ($prod_check) {
        //         if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
        //             return "already added";
        //             dd("already added");
        //             // return response()->json(['status' => $prod_check->name . " already added to cart"], 422);
        //         } else {
        //             dd("add");
        //             $cartItem = new Cart();
        //             $cartItem->prod_id = $product_id;
        //             $cartItem->user_id = Auth::id();
        //             $cartItem->save();
        //             return response()->json(['status' => $prod_check->name . " added to cart"], 200);
        //         }
        //     }
        // } else {
        //     dd("not logged in");
        //     return response()->json(['status' => "Login to continue"], 422);
        // }
    }

    public function cart()
    {
        $categories = Category::with('children')->whereNull('parent_id')->where('featured', 0)->get();
        $trending = Category::with('children')->whereNull('parent_id')->where('featured', 1)->get();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('front.cart', compact('cartitems', 'categories', 'trending'));
    }

    public function deleteProduct(Request $request)
    {
        $user = Auth::user();
        $product = Product::find($request->product_id);
        if (!$product) {
            return response()->json(["error" => "Product not found"], 404);
        }
        $Cart = Cart::whereProductId($product->id)->whereUserId($user->id)->first();
        $Cart->delete();

        return response()->json(["message" => "Product deleted"]);
    }
}
