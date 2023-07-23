<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $products = Product::all();
        $total_orders = Order::count();
        $sum_orders = Order::select('amount')->sum('amount');

        return view('admin.orders.list', compact('orders', 'products', 'total_orders', 'sum_orders'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
           'products_id' => 'required',
           'delivery_date' => 'nullable',
           'customer' => 'required',
           'phone' => 'required',
           'address' => 'required',
        ]);

        $order = new Order();
        $order->products_id = $request->products_id;
        $order->quantity = $request->quantity;
        $order->note = $request->note;
        $order->customer = $request->customer;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $date = Carbon::now();
        $order->delivery_date = $date->addDays(6);
        $order->save();
        $order->amount = $order->quantity * $order->product->price;
        $order->save();

        $customer = new Customer();
        $customer->name = $request->customer;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();
        return redirect()->back()->with('created', 'Order created successfully');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back()->with('deleted', "Order deleted successfully");
    }
}
