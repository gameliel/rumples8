<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    public function index(){
        $sizes = Size::all();
        return view('admin.size.index', compact('sizes'));
    }

    public function add(){
        return view('admin.size.add');
    }

    public function insert(Request $request)
    {
        $size = new Size();
        $size->name = $request->input('name');
        $size->slug = $request->input('slug');
        $size->save();
        return redirect('add-size')->with('status', 'size added successfully');
    }

    public function edit($id)
    {
        $size = Size::find($id);
        return view('admin/size/edit', compact('size'));
    }

    public function update(Request $request, $id)
    {
        $size = Size::find($id);

        $size->name = $request->input('name');
        $size->slug = $request->input('slug');

        $size->update();
        return redirect('sizes')->with('status', 'size updated successfully');
    }
    public function destroy($id)
    {
        $size = Size::find($id);
        $size->delete();
        return redirect('sizes')->with('status', 'size deleted successfully');
    }
}
