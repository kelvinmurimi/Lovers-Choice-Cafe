<?php

declare(strict_types=1);

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
class PagesController extends Controller
{
    //

    public function index(){
        $menus=Menu::latest()->paginate(6);
        return view("frontend.pages.index",compact('menus'));
    }
}
