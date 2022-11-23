<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Customer;
use Carbon\Carbon;

class MarketController extends Controller
{
    public function index() {
        $products  = Produk::all();
        $customers = Customer::all();
        return view('market.index', compact('products', 'customers'));
    }


    public function detail($id) {
        // $item = Produk::find($id);
        $item = Produk::with('brand')
                      ->where('id', $id)
                      ->get()[0];
        if ($item) {
            return $item;
        } else {
            session(['error' => 'Product not found, might be deleted. Please refresh the page.']);
            return null;
        }
    }


    public function cart($uid) {
        $orders        = Order::where('customer_id', $uid)
                              ->where('payment_date', '')
                              ->get();

        $orders->count      = 0;
        $orders->total_item = 0;
        $orders->sum        = 0;

        $customer      = Customer::where('id', $uid)->firstOrFail();

        foreach ($orders as $order) {
            $order->detail = Order_detail::with('produk')
                                         ->where('order_id', $order->id)
                                         ->first();
            ++$orders->count;
            $orders->total_item += $order->detail->qty;
            $orders->sum        += $order->payment_total;
        }

        $orders->sum = number_format($orders->sum);

        return view('market.cart', compact('orders', 'customer'));
    }


    public function order($uid, $id) {
        $order = Order::find($id);
        if (!$order) {
            session(['error' => 'Order not found.']);
            return null;
        }

        $order_detail = Order_detail::where('order_id', $order->id)->get();
        if (!$order_detail) {
            session(['error' => 'Cannot find order details.']);
            return null;
        }

        return compact('order', 'order_detail');
    }


    // ? Add item to 'cart'
    public function store(Request $request) {
        $request->validate([
            'qty' => 'required|numeric|min:0|not_in:0',
        ]);

        $produk = Produk::find($request->produk_id);

        if (!$produk) {
            session(['error' => 'Product not found.']);
            return redirect('/market');
        } else if ($produk->stok <= 0) {
            session(['error' => 'Stok kosong.']);
            return redirect('/market');
        }

        if ($request->qty <= 0) {
            session(['error', 'Qty should be more than 0']);
            return redirect('/market');
        } else if ($request->qty > $produk->stok) {
            session(['error' => 'Order request cannot be more than the available stock: ' + $produk->stok]);
            return redirect('/market');
        }

        $customer = Customer::find($request->customer_id);

        if (!$customer) {
            session(['error' => 'Customer data not found.']);
            return redirect('/market');
        }

        $current_time = Carbon::now();
        $order        = new Order();
        $order_detail = new Order_detail();

        $order->order_date    = $current_time;
        $order->payment_date  = '';
        $order->payment_total = ($produk->harga) * ($request->qty);
        $order->customer_id   = $customer->id;
        $order->save();

        $order_detail->order_id   = $order->id;
        $order_detail->produk_id  = $produk->id;
        $order_detail->qty        = $request->qty;
        $order_detail->unit_price = $produk->harga;
        $order_detail->save();

        return redirect('/market');
    }


    public function update($uid, Request $request) {
        $id = $request->order_id;
        $order        = Order::find($id);
        $order_detail = Order_detail::where('order_id', $order->id)
                                    ->first();
        $produk       = Produk::find($request->produk_id);

        if (!$produk) {
            session(['error' => 'Product not found.']);
            return redirect('/market/cart/'.$uid);
        } else if ($produk->stok <= 0) {
            session(['error' => 'Stok kosong.']);
            return redirect('/market/cart/'.$uid);
        }

        if ($request->qty <= 0) {
            session(['error', 'Qty should be more than 0']);
            return redirect('/market/cart/'.$uid);
        } else if ($request->qty > $produk->stok) {
            session(['error' => 'Order request cannot be more than the available stock: ' + $produk->stok]);
            return redirect('/market/cart/'.$uid);
        }

        $order->payment_total = ($produk->harga) * ($request->qty);
        $order->save();

        $order_detail->qty        = $request->qty;
        $order_detail->unit_price = $produk->harga;
        $order_detail->save();

        return redirect('/market/cart/'.$uid);
    }


    public function delete($uid, $id, Request $request) {
        $order        = Order::find($id);
        $order_detail = Order_detail::where('order_id', $order->id)
                                    ->first();

        if (!$order) {
            session(['error' => 'Cannot find order data.']);
            return redirect('/market/cart/'.$uid);
        }

        if (!$order_detail) {
            session(['error' => 'Cannot find order detail data']);
            return redirect('/market/cart/'.$uid);
        }

        $order_detail->delete();
        $order->delete();

        return redirect('/market/cart/'.$uid);
    }


    // ? Reset cart
    public function reset($uid, Request $request) {
        $orders = Order::where('customer_id', $uid)
                       ->where('payment_date', '')
                       ->get();
        // return $orders;
        if (!$orders) {
            session(['error' => 'Cart is empty.']);
            return redirect('/market/cart/'.$uid);
        }

        foreach ($orders as $order) {
            $order_detail = Order_detail::where('order_id', $order->id)
                                        ->first();
            $order_detail->delete();
            $order->delete();
        }

        session(['message' => 'Cart was successfully cleared']);

        return redirect('/market/cart/'.$uid);
    }


    public function checkout($uid, Request $request) {
        $orders = Order::where('customer_id', $uid)
                       ->where('payment_date', '')
                       ->get();

        // return $orders;

        $current_time = Carbon::now();
        foreach ($orders as $order) {
            $order->payment_date = $current_time;
            $order->save();

            $order_detail  = Order_detail::where('order_id', $order->id)->firstOrFail();
            $produk        = Produk::find($order_detail->produk_id);
            $produk->stok -= $order_detail->qty;
            $produk->save();
        }

        return redirect('/market/cart/'.$uid);
    }
}
