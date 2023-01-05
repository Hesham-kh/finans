<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class FrontController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =Product::all();
        $carts =Cart::all();

        return view('frontPage.index',compact('products','carts'));
    }
    public function cart()
    {
        $carts =Cart::all();
        return view('frontPage.cart',compact('carts'));
    }
    public function contact()
    {
        return view('frontPage.contact');
    }
    public function about()
    {
        return view('frontPage.about');
    }

    
    
    public function store(Request $request)
    {
        
    }

  
    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

   
    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
