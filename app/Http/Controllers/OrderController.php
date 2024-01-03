<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $order=Order::all();

        return view('');
    }


    public function checkout(){

        $user_id=Auth::id();
        $carts=Cart::where('user_id',$user_id)->get();

        if($carts==null){
            return redirect()->back();
        }

        $order = Order::create([
            'user_id' => $user_id,
        ]);

        foreach($carts as $cart){
            $product=Product::find($cart->product_id);

            $product->update([
                'amount' => $product->amount - $cart->amount,
            ]);

            Transaction::create([
                'amount'=>$cart->amount,
                'order_id' => $order->id,
                'product_id' => $cart->product_id

            ]);
            $cart->delete();
        }



        return redirect()->back();

    }
}
