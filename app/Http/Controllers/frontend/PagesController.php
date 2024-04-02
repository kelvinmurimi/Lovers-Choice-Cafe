<?php

declare(strict_types=1);

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\cart;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //

    public function index(){
        $menus=Menu::latest()->paginate(6);
        return view("frontend.pages.index",compact('menus'));
    }

    public function addcart(Request $request, $id){
     if(Auth::id()){
        //dd($id);
        $user=Auth::user();
        $menu=Menu::find($id);
        $cartdata= new cart;
        $cartdata->user_id=$user->id;
        $cartdata->menu_id=$menu->id;
        $cartdata->menuname=$menu->name;
        $cartdata->menudescription=$menu->description;
        $cartdata->price=$menu->price;
        $cartdata->quantity=$request->quantity;
        $cartdata->name=$user->name;
        $cartdata->email=$user->email;
        $cartdata->save();
        return to_route('pages.index')->with('success', 'Order Placed successfully.');

     }else{
        return redirect('login');
     }
    }

    public function orders(){
        $orders=cart::all();
       return view('backend.orders',compact('orders'));
    }
}
