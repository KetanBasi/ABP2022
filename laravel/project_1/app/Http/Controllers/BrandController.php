<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Produk;

class BrandController extends Controller
{
    public function index() {
        // $list = Brand::all();
        $list = Brand::with('produk')
                        ->withCount('produk as jumlah_produk')
                        // ->withCount('produk->nama_gudang as jumlah_gudang')
                        ->get();
        // dd($list[0]->gudang->count());
        return view('brand.index', compact('list'));
        // return $list;
    }

    public function create() {
        return view('brand.create');
    }

    public function store(Request $req) {
        if ($req->nama_brand == null) {
            session(['error' => 'Nama Brand cannot be empty.']);
        } else {
            $brand = new Brand();
            $brand->nama_brand = $req->nama_brand;
            $brand->save();
            session(['message' => 'Item added successfully']);
            return redirect('/brand');
        }
        return redirect('/brand/create');
    }

    public function edit($id) {
        $detail = Brand::find($id);
        return view('brand.edit', compact('detail'));
    }

    public function update($id, Request $req) {
        $cek = Brand::find($id);
        if ($cek) {
            $cek->nama_brand = $req->nama_brand;
            $cek->save();
            session(['message' => 'Item edited successfully']);
        } else {
            session(['error' => "Data tidak ditemukan"]);
        }
        return redirect('/brand');
    }

    public function delete($id) {
        $cek = Brand::find($id);
        if ($cek) {
            $cek->delete();
            session(['message' => 'Item deleted successfully']);
        } else {
            session(['error' => "Data tidak ditemukan"]);
        }
        return redirect('/brand');
    }
}
