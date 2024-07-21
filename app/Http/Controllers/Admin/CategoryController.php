<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('cover/', $filename);

            $category = new Category([
                'name' => $request->name,
                'author' => $request->author,
                'body' => $request->body,
                'cover' => $filename,
            ]);
            $category->save();
        }
        return redirect('/dashboard');
    }
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }
    public function update(Request $request, $id)
    {
        $categories = Category::find($id);
        if ($request->hasFile('cover')) {
            if (File::exists('cover/' . $categories->cover)) {
                File::delete('cover/' . $categories->cover);
            }
            $file = $request->file('cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('cover/', $filename);
            $categories->cover = $filename;

        }

        $categories->update([
            'name' => $request->name,
            'author' => $request->author,
            'body' => $request->body
        ]);

        return redirect('/dashboard');
    }
    public function destroy($id)
    {
        $categories = Category::find($id);
        if (File::exists('cover/' . $categories->cover)) {
            File::delete('cover/' . $categories->cover);
        }
        $categories->delete();
        return redirect('/dashboard');
    }
}
