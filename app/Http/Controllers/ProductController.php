<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Traits\productTraits;
use Illuminate\Http\Request;

class ProductController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth');
    }
    
 use productTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $products =Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
         return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'name' => 'required|max:50|min:5',
        ]);
        $file_name = $this->saveImage($request->product_img, 'images/products');
        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->oldPrice = $request->oldPrice;
        $product->newPrice = $request->newPrice;
        $product->product_img =$file_name;
        $product->created_at = now();
        $product->updated_at = now();
        $product->save();
        return redirect()->back();
    }

    public function edit($id)
    {
         $product = Product::find($id);
        $categories=Category::all();
        return view('admin.products.edit', compact('product','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validated = $request->validate([
            'name' => 'required|max:50|min:5',
        ]);
    $file_name = $this->saveImage($request->product_img, 'images/products');
        $product =Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->oldPrice = $request->oldPrice;
        $product->newPrice = $request->newPrice;
        $product->product_img =$file_name;
        $product->created_at = now();
        $product->updated_at = now();
        $product->save();
        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $product =Product::find($id);
        $product->delete();
        return redirect()->back();

    }
}
