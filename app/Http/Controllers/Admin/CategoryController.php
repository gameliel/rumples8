<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index(){
        // $categories = Category::with('children')->whereNull('parent_id')->get();
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function add(){
        $categories = Category::all();
        return view('admin.category.add', compact('categories'));
    }

    public function insert(Request $request)
    {
        $category = new Category();
        $category->parent_id = $request->input('parent_id');
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->featured = $request->input('featured') == TRUE ? '1':'0';
        $category->save();
        return redirect('add-category')->with('status', 'Category added successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin/category/edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->parent_id = $request->input('parent_id');
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->featured = $request->input('featured') == TRUE ? '1':'0';

        $category->update();
        return redirect('categories')->with('status', 'Category updated successfully');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('categories')->with('status', 'Category deleted successfully');
    }
}
