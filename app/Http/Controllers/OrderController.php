<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Address;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.orders');
    }

    public function show($id)
    {
        $order = Order::find($id);
        
        return view('order.show_order', compact('order'));
    }

    public function address()
    {
        session(['buying' => true]);

        return view('order.select_address');
    }

    public function create($id)
    {
        $address = Address::find($id);

        return view('order.create_order', compact('address'));
    }

    public function store(Request $request)
    {
        $id = $request->input('address');
        $address = Address::find($id);

        $cart = auth()->user()->cart;

        $total = 0;

        foreach ($cart as $product)
        {
            $total += $product->price - (($product->price * $product->discount) / 100);
        }

        if ($total == 0)
        {
            return redirect('/orders');
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'address_id' => $address->id,
            'total' => $total,
            'status' => 'In progress'
        ]);

        foreach ($cart as $product)
        {
            $product->order_id = $order->id;
            $product->save();
        }

        auth()->user()->cart()->detach();

        return view('order.orders');
    }
}
