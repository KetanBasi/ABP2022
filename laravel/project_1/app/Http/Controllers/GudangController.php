<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gudang;
use App\Models\Produk;

class GudangController extends Controller
{
    public function index() {
        // $list = Gudang::all();
        // $list = Gudang::with('produk')->get();
        $list = Gudang::with('produk')
                        ->withSum('produk as jumlah_stok', 'stok')
                        ->get();
        // $list = Produk::with('brand:id,nama_brand', 'gudang');
        return view('gudang.index', compact('list'));
        // return $list;
    }

    public function details($id) {
        $list = Gudang::with('produk')
                        ->withSum('produk as jumlah_stok', 'stok')
                        ->where('id', $id)
                        ->get()[0];
        return $list;
    }

    public function create() {
        return view('gudang.create');
    }

    public function store(Request $req) {
        if ($req->nama_gudang == null) {
            session(['error' => 'Nama Gudang cannot be empty.']);
        } else if ($req->alamat == null) {
            session(['error' => 'Alamat cannot be empty.']);
        } else {
            $gudang = new Gudang();
            $gudang->nama_gudang = $req->nama_gudang;
            $gudang->alamat = $req->alamat;
            $gudang->save();
            session(['message' => 'Item added successfully']);
            return redirect('/gudang');
        }
        return redirect('/gudang/create');
    }

    public function edit($id) {
        // $detail = Gudang::where('id', $id)->get();
        $detail = Gudang::find($id);
        // return Gudang::where('id', $id)->update();
        return view('gudang.edit', compact('detail'));
    }

    public function update($id, Request $req) {
        $cek = Gudang::find($id);
        if ($cek) {
            $cek->nama_gudang = $req->nama_gudang;
            $cek->alamat = $req->alamat;
            $cek->save();
            session(['message' => 'Item edited successfully']);
        } else {
            session(['error' => "Data tidak ditemukan"]);
        }
        return redirect('/gudang');
    }

    public function delete($id) {
        $cek = Gudang::find($id);

        if ($cek) {
            $cek->delete();
            session(['message' => 'Item deleted successfully']);
            return redirect("/gudang");
        } else {
            session(['error' => "Data tidak ditemukan"]);
        }
        return redirect('/gudang');
    }
}
