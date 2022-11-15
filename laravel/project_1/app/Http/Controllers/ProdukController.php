<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Brand;
use App\Models\Gudang;

class ProdukController extends Controller
{
    public function index() {
        // $list = Produk::all();
        $list = Produk::with('brand:id,nama_brand', 'gudang:id,nama_gudang')->get();
        // $list = Produk::join('brand', 'produk.brand_id', '=', 'brand.id')
        //             ->join('gudang', 'produk.gudang_id', '=', 'gudang.id')
        //             ->all();
        // $brand = Brand::all();
        // $gudang = Gudang::all();
        return view('produk.index', compact('list'));
        // return $list;
    }

    public function create() {
        $brand  = Brand ::all();
        $gudang = Gudang::all();
        return view('produk.create', compact('brand', 'gudang'));
    }

    public function store(Request $req) {
        // if ($req->nama_produk == null)      $err_it = "Nama Produk";
        // else if ($req->stok == null)        $err_it = "Stok";
        // else if ($req->harga == null)       $err_it = "Harga";
        // else if ($req->nama_brand == null)  $err_it = "Brand";
        // else if ($req->nama_gudang == null) $err_it = "Gudang";
        if (!$this->validate_attr($req)) {
            // session(['error' => $err_it.' cannot be empty.']);
            return redirect('/produk/create');
        }
        $produk = new Produk();
        $produk->nama_produk = $req->nama_produk;
        $produk->stok        = $req->stok;
        $produk->harga       = $req->harga;
        $produk->brand_id    = $req->brand_id;
        $produk->gudang_id   = $req->gudang_id;
        // $produk->brand_id    = Brand::select('id as brand_id')
        //                             ->where('nama_brand', '=', $req->nama_brand)
        //                             ->first()['brand_id'];
        // $produk->brand_id = $this->get_brand($req->nama_brand, 'id');
        // $produk->brand_id = $this->get_brand($req->nama_brand);
        // $produk->gudang_id   = Gudang::select('id as gudang_id')
        //                             ->where('nama_gudang', '=', $req->nama_gudang)
        //                             ->first()['gudang_id'];
        // $produk->gudang_id = $this->get_gudang($req->nama_gudang, 'id');
        // $produk->gudang_id = $this->get_gudang($req->nama_gudang);
        $produk->save();
        session(['message' => 'Item added successfully']);
        return redirect('/produk');
    }

    public function edit($id) {
        $detail = Produk::find($id);
        $brand  = Brand ::all();
        $gudang = Gudang::all();
        return view('produk.edit', compact('detail', 'brand', 'gudang'));
    }

    public function update($id, Request $req) {
        // return $req;
        $cek = Produk::find($id);
        if ($cek) {
            $cek->nama_produk = $req->nama_produk;
            $cek->stok      = $req->stok;
            $cek->harga     = $req->harga;
            $cek->brand_id  = $req->brand_id;
            $cek->gudang_id = $req->gudang_id;
            // $cek->brand_id = Brand::select('id as brand_id')
            //                         ->where('nama_brand', '=', $req->nama_brand)
            //                         ->first()['brand_id'];
            // $cek->brand_id = $this->get_brand($req->nama_brand, 'id');
            // $cek->brand_id = $this->get_brand($req->nama_brand);
            // $cek->gudang_id = Gudang::select('id as gudang_id')
            //                         ->where('nama_gudang', '=', $req->nama_gudang)
            //                         ->first()['gudang_id'];
            $cek->gudang_id = $this->get_gudang($req->nama_gudang);
            return $cek;
            $cek->save();
            session(['message' => 'Item edited successfully']);
        } else {
            session(['error' => "Data tidak ditemukan"]);
        }
        return redirect('/produk');
    }

    public function delete($id) {
        $cek = Produk::find($id);

        if ($cek) {
            $cek->delete();
            session(['message' => 'Item deleted successfully']);
            return redirect("/produk");
        } else {
            session(['error' => "Data tidak ditemukan"]);
        }
        return redirect('/produk');
    }

    public function validate_attr($obj) {
        if      ($obj->nama_produk == null) $err_it = "Nama Produk";
        else if ($obj->stok        == null) $err_it = "Stok";
        else if ($obj->harga       == null) $err_it = "Harga";
        else if ($obj->nama_brand  == null) $err_it = "Brand";
        else if ($obj->nama_gudang == null) $err_it = "Gudang";

        // FIXME - Brand & Gudang Validation
        // else if ($this->get_brand( $obj->nama_brand,  'id') == null)
        //     $err_it = "Brand";

        // else if ($this->get_gudang($obj->nama_gudang, 'id') == null)
        //     $err_it = "Gudang";

        else return true;

        session(['error' => $err_it.' cannot be empty.']);
        return false;
    }

    public static function get_brand($nama) {
        $cek = Brand::select('id')
                    ->where('nama_brand', '=', $nama)
                    ->first()['id'];
        return $cek;
        // return Brand::whereId($id)->get();
        // return Brand::select('nama_brand')
        //             ->where('id', '=', $id)
        //             ->first()['nama_brand'];
        // return Brand::join('table_produk', 'table_produk.brand_id', '=', 'table_brand.id')
        //             ->select('table_brand.nama_brand as nama_brand')
        //             ->where('table_brand.id', '=', $id)
        //             ->first()['nama_brand'];
    }

    public static function get_brand_name($id) {
        $cek = Brand::find($id);
        if ($cek) {
            return $cek->nama_brand;
            // return $cek[$attr];
        } else {
            session(['error' => "Data tidak ditemukan"]);
            return null;
        }
    }

    public static function get_gudang($nama) {
        $cek = Gudang::select('id')
                    ->where('nama_gudang', '=', $nama)
                    ->first()['id'];
        return $cek;
        // return Gudang::select('nama_gudang')
        //             ->where('id', '=', $id)
        //             ->first()['nama_gudang'];
    }

    public static function get_gudang_name($id) {
        $cek = Gudang::find($id);
        if ($cek) {
            return $cek->nama_gudang;
            // return $cek[$attr];
        } else {
            session(['error' => "Data tidak ditemukan"]);
            return null;
        }
    }
}
