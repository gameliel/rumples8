<?php

namespace App\Http\Controllers\useraccess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\Category;
use App\Models\FindMyspec;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class findmyspecController extends Controller
{
    public function myspec($id)
    {
        // dd('i am here');
        if(Auth::check())
        {
            $spec = FindMyspec::find($id);
            $products = Product::where('size_id', $spec->id);

            return view('front.myspec', compact('spec', 'products'))->with('status', 'welcome to your spec');
        }
        else
        {
            return redirect('/')->with('status', 'no spec for u please sign in and save your spec');
        }
    }

    public function addSpec()
    {
        $sizes = Size::all();
        $categories = Category::with('children')->whereNull('parent_id')->where('featured', 0)->get();
        $trending = Category::with('children')->whereNull('parent_id')->where('featured', 1)->get();
        $products = Product::all();
        return view('front.findspec', compact('sizes', 'categories', 'trending', 'products'));
    }

    public function insert(Request $request)
    {
        $sizes = Size::all();
        $categories = Category::with('children')->whereNull('parent_id')->where('featured', 0)->get();
        $trending = Category::with('children')->whereNull('parent_id')->where('featured', 1)->get();
        $products = Product::all();

        $spec = $request->input('neck_id');
        $spec = $request->input('body_id');
        $spec = $request->input('leg_id');
        $spec = $request->input('foot_id');


        if(Auth::check())
        {
            $spec = new FindMyspec();

            $spec->user_id = Auth::id();
            $spec->neck_id = $request->input('neck_id');
            $spec->body_id = $request->input('body_id');
            $spec->leg_id = $request->input('leg_id');
            $spec->foot_id = $request->input('foot_id');

            $spec->save();
            return view('front.findspec', compact('spec', 'sizes', 'categories', 'trending'))->with('status', 'spec saved');
        }
    }
}
