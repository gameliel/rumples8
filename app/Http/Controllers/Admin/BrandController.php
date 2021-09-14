<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    public function add(){
        return view('admin.brand.add');
    }

    public function insert(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->input('name');
        $brand->slug = $request->input('slug');
        $brand->save();
        return redirect('add-brand')->with('status', 'brand added successfully');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin/brand/edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);

        $brand->name = $request->input('name');
        $brand->slug = $request->input('slug');

        $brand->update();
        return redirect('brands')->with('status', 'brand updated successfully');
    }
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('brands')->with('status', 'brand deleted successfully');
    }
}
