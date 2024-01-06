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
        $orders=Order::all();
        // dd($orders);

        return view('order.index_order',compact('orders'));
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

        return redirect()->route('show_detail_order',$order);

    }


    public function show_detail_order(Order $order){

        return view('order.show_detail_order',compact('order'));
    }



    public function receipt(Order $order , Request $request){
        $file= $request->file('payment_receipt');
        $imageFileName = time() . '_' . $order->id . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/receipt'), $imageFileName);

        $order->update([
            'payment_receipt'=>$imageFileName
        ]);

        // dd($order);

        return redirect()->back();
    }

    public function confirm_payment(Order $order){

        $order->update([
           'is_paid'=> true
        ]);

        return redirect()->back();
    }
}
