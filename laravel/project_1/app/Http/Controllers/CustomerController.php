<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index() {
        $list = Customer::all();
        return view('customer.index', compact('list'));
    }

    public function create() {
        return view('customer.create');
    }

    public function store(Request $req) {
        if ($req->nama_customer == null) {
            session(['error' => 'Nama Customer cannot be empty.']);
        } else if ($req->alamat == null) {
            session(['error' => 'Alamat cannot be empty.']);
        } else if ($req->no_hp == null) {
            session(['error' => 'No. HP cannot be empty.']);
        } else {
            $customer = new Customer();
            $customer->nama_customer = $req->nama_customer;
            $customer->alamat = $req->alamat;
            $customer->no_hp = $req->no_hp;
            $customer->save();
            session(['message' => 'Item added successfully']);
            return redirect('/customer');
        }
        return redirect('/customer/create');
    }

    public function edit($id) {
        // $detail = Customer::where('id', $id)->get();
        $detail = Customer::find($id);
        // return Customer::where('id', $id)->update();
        return view('customer.edit', compact('detail'));
    }

    public function update($id, Request $req) {
        $cek = Customer::find($id);
        if ($cek) {
            $cek->nama_customer = $req->nama_customer;
            $cek->alamat = $req->alamat;
            $cek->no_hp = $req->no_hp;
            $cek->save();
            session(['message' => 'Item edited successfully']);
        } else {
            session(['error' => "Data tidak ditemukan"]);
        }
        return redirect('/customer');
    }

    public function delete($id) {
        $cek = Customer::find($id);

        if ($cek) {
            $cek->delete();
            session(['message' => 'Item deleted successfully']);
            return redirect("/customer");
        } else {
            session(['error' => "Data tidak ditemukan"]);
        }
        return redirect('/customer');
    }
}
