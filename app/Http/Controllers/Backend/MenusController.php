<?php

declare(strict_types=1);

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenusController extends Controller
{
    //
    public function index()
    {
        $menus = Menu::latest()->paginate(6);
        return view('backend.menus.index', compact('menus'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.menus.create', compact('categories'));
    }

    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('public/menus');

        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);

        if ($request->has('categories')) {
            $menu->categories()->attach($request->categories);
        }

        return to_route('backend.menus.index')->with('success', 'Menu created successfully.');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $categories = Category::all();
        return view('backend.menus.edit', compact('menu', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $menu = Menu::findOrFail($id);
        $image = $menu->image;
        if ($request->hasFile('image')) {
            Storage::delete($menu->image);
            $image = $request->file('image')->store('public/menus');
        }

        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);

        if ($request->has('categories')) {
            $menu->categories()->sync($request->categories);
        }
        return to_route('backend.menus.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        Storage::delete($menu->image);
        $menu->categories()->detach();
        $menu->delete();
        return to_route('backend.menus.index')->with('danger', 'Menu deleted successfully.');
    }


}
