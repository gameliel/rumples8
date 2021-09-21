<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Size;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function add(){
        $categories = Category::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $users = User::all();
        $products = Product::all();
        return view('admin.product.add', compact('categories', 'brands', 'sizes', 'users', 'products'));
    }

    public function insert(Request $request)
    {
        $products = new Product();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products',$filename);
            $products->image = $filename;
        }
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->short_description = $request->input('short_description');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->discount_price = $request->input('discount_price');
        $products->SKU = $request->input('SKU');
        $products->alteration = $request->input('alteration');
        $products->alteration_price = $request->input('alteration_price');
        $products->laundry = $request->input('laundry');
        $products->laundry_price = $request->input('laundry_price');
        $products->stock_status = $request->input('stock_status');
        $products->featured = $request->input('featured');
        $products->category_id = $request->input('category_id');
        $products->size_id = $request->input('size_id');
        $products->brand_id = $request->input('brand_id');
        $products->save();
        return redirect('products')->with('status', 'Product added successfully');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $users = User::all();
        $products = Product::find($id);

        return view('admin.product.edit', compact('products', 'categories', 'brands', 'sizes'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products',$filename);
            $products->image = $filename;
        }
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->short_description = $request->input('short_description');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->discount_price = $request->input('discount_price');
        $products->SKU = $request->input('SKU');
        $products->alteration = $request->input('alteration');
        $products->alteration_price = $request->input('alteration_price');
        $products->laundry = $request->input('laundry');
        $products->laundry_price = $request->input('laundry_price');
        $products->stock_status = $request->input('stock_status');
        $products->featured = $request->input('featured');
        $products->category_id = $request->input('category_id');
        $products->size_id = $request->input('size_id');
        $products->brand_id = $request->input('brand_id');
        $products->update();
        return redirect('products')->with('status', 'Products updated with success.');
    }

    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect('products')->with('status', 'Product deleted successfully');
    }
}
