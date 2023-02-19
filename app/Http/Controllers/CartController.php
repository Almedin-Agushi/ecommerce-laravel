<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller{
    public function index() {
        return view('cart');
    }


    public function add(Request $request, $product){
       $product = Product::findOrFail($product);

        $request->validate([
            'qty' => 'required|integer|lte:'.$product->qty
        ]);

        $item = array(
            'id' => $product->id,
            'price' => $product->price,
            'quantity' => $request->qty,
            'name' => $product->name
        );

        
        // Add product to the cart
        if(\Cart::add($item)){
             // Redirect cart
        return redirect()->route('shop')->with('success', 'Product added to cart successfully.');
        }
        
        // Redirect cart
        return redirect()->back()->with('success', 'Went wrong');

    }

    public function inc($item) {
        $product = Product::findOrFail($item);
        $cart_item = \Cart::get($item);

        if($cart_item['quantity'] < $product->qty) {
            \Cart::update($item, ['quantity' => 1]);
            return redirect()->back();
        } else {
            return redirect()->back()->with('cart_status', 'We only have ' .$product->qty .' ' .$product->name .' in stock!');
        }
    }

    public function dec($item) {
        $product = Product::findOrFail($item);
        $cart_item = \Cart::get($item);

        if($cart_item['quantity'] <= 1) {                 //nese qty osht 1 kur ta prek - dmth fshije produktin perndryshe nese osht 3 zvogloje
            \Cart::remove($item);
        } else {
            \Cart::update($item, ['quantity' => -1]);
        }

        return redirect()->back();
    }

    public function checkout(Request $request) {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        $data = $request->only(['fullname', 'email', 'phone']);
        $data['user_id'] = Auth::id();
        $data['total'] = \Cart::getTotal();

        $order = Order::create($data);
        $pids = [];

        foreach(\Cart::getContent() as $item) { 
            $pids[] = $item->id;

            // update stock
            $p = Product::find($item->id);
            $p->qty -= $item->quantity;
            $p->save();

            // delete item from cart
            \Cart::remove($item->id);           // kur ta bojm checkout me emrin  phone.. fshije orderin

        }
        $order->products()->attach($pids);

        return redirect()->route('orders.index')->with('status', 'Order was created successfully.');
    }



}
