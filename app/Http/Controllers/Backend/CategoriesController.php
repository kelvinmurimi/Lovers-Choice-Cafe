<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CategoriesController extends Controller
{
    //
    public function index()
    {
        $categories = Category::latest()->paginate(6);
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $image = $request->file('image')->store('public/categories');

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);

        return to_route('backend.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view('backend.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
      
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
         $category=Category::findOrFail($id);
        $image = $category->image;
        if ($request->hasFile('image')) {
            Storage::delete($category->image);
            $image = $request->file('image')->store('public/categories');
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);
        return to_route('backend.categories.index')->with('success', 'Category updated successfully.');
    }




    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        Storage::delete($category->image);
        //$category->menus()->detach();
        $category->delete();

        return to_route('backend.categories.index')->with('danger', 'Category deleted successfully.');
    }
}
