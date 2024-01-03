<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(){
        $product =Product::all();
        // dd($product);
        return view('product.index_product', compact('product'));
    }

    public function create(){
        return view('product.create_product');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>'required',
            'stock'=>'required',
        ]);

        $file = $request->file('image');
        $imageFileName = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
        $path =$file->storeAs('public/assets/product_image',$imageFileName);
        $file->move(public_path('assets/product_image'), $imageFileName);

        Product::create([
            'name'=> $request->name,
            'price'=> $request->price,
            'description'=> $request->description,
            'stock'=> $request->stock,
            'image'=>$imageFileName,
        ]);
       return redirect()->route('index_product');
    }




    public function show(Product $product){

        return view('product.show_product',compact('product'));
    }



    public function edit(Product $product){
        return view('product.edit_product',compact('product'));
    }

    public function update( Product $product ,Request $request ){
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>'required',
            'stock'=>'required',
        ]);

        $file = $request->file('image');
        $imageFileName = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
        $path =$file->storeAs('public/assets/product_image',$imageFileName);
        $file->move(public_path('assets/product_image'), $imageFileName);

       $product->update([
            'name'=> $request->name,
            'price'=> $request->price,
            'description'=> $request->description,
            'stock'=> $request->stock,
            'image'=>$imageFileName,
        ]);
       return redirect()->route('show_product',compact('product'));
    }

    public function delete(Product $product){
        $product->delete();

        return redirect()->back();
    }
}
