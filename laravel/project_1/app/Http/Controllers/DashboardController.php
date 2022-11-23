<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Gudang;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Produk;
use App\Models\User;
use stdClass;

class DashboardController extends Controller
{
    public function dashboard() {
        $produk      = Produk::get();
        $produk_sum  = 0;
        $total_asset = 0;

        foreach ($produk as $item) {
            $produk_sum  += $item->stok;
            $total_asset += $item->harga;
        }

        $data = new stdClass();

        $data->produk         = new stdClass();
        $data->produk->sum    = $produk_sum;
        $data->produk->count  = Produk::get()->count();
        $data->brand_count    = Brand::get()->count();
        $data->customer_count = Customer::get()->count();
        $data->gudang_count   = Gudang::get()->count();
        // $data->total_asset    = $total_asset;
        $data->total_asset    = number_format($total_asset);

        // return $data;

        // return $produk;
        return view('home', compact('data'));
    }
}
