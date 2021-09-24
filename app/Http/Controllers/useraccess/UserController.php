<?php

namespace App\Http\Controllers\useraccess;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;

class UserController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->where('featured', 0)->get();
        $trending = Category::with('children')->whereNull('parent_id')->where('featured', 1)->get();

        $orders = Order::where('user_id', Auth::id())->get();
        return view('front.orders.index', compact('orders', 'categories', 'trending'));
    }

    public function view($id)
    {
        $categories = Category::with('children')->whereNull('parent_id')->where('featured', 0)->get();
        $trending = Category::with('children')->whereNull('parent_id')->where('featured', 1)->get();

        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();

        return view('front.orders.view', compact('categories', 'trending', 'orders'));
    }
}
