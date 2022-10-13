<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index() {
        $list = Produk::all();
        return view('produk.index', compact('list'));
        // return view('produk.index');
    }

    public function create() {
        return view('produk.create');
    }

    public function store(Request $req) {
        $produk = new Produk();
        $produk->nama_produk = $req->nama_produk;
        $produk->stok = $req->stok;
        $produk->save();
        return redirect('/produk');
    }
}
