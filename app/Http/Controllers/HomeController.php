<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        if (Auth::id()) {
            $is_admin = Auth()->user()->is_admin;
            if ($is_admin == 0) {
                return view('dashboard');
            } else if ($is_admin == 1) {
                return redirect('/admin');
            }
        } else {
            return redirect()->back();
        }
    }

    public function productDetail($id)
{ 
   
    $product = product::with(['images'])->findOrFail($id);

  
    $relatePro = product::where('provider_id', $product->provider_id)
    ->where('product_id', '<>', $id)
    ->take(5)
    ->get();
    return view('pages.productdetail', compact('product','relatePro'));
}
}
