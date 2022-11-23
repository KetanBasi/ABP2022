@extends('produk.index')

@section('form_title', 'Add Item')

@section('custom_internal_css')
    <style>
        .input-group.form-floating > select.form-control {
            /*  */
        }
        .input-group.form-floating > label.form-label {
            transform: scale(0.9) translateY(-1.4rem);
        }
    </style>
@endsection

@section('main_content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">

                <!-- ANCHOR: Table Title -->
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg p-4 row justify-content-between">
                        <h6 class="text-white text-capitalize col-4 m-0 lh-1 align-self-center">@yield('form_title')</h6>
                    </div>
                </div>

                <!-- SECTION: Table Data -->
                <div class="card-body px-0 pb-2">

                    <div class="container-fluid py-0">
                        @include('shared.alert')
                    </div>

                    <div class="container-fluid table-responsive p-0">

                        <form action="/produk" method="POST" class="align-items-center mb-0 p-3" style="">
                            @csrf

                            <div class="ms-md auto pe-md-3 d-flex align-items-center mb-4">
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Nama Produk</label>
                                    <input type="text" name="nama_produk" class="form-control" />
                                </div>
                            </div>

                            <div class="ms-md auto pe-md-3 d-flex align-items-center mb-4">
                                <div class="input-group input-group-outline form-floating" style="">
                                    <select name="brand_id" id="brand_id" class="form-control form-select" list="brand_list_opt" aria-label="Floating Default label select example">
                                        <datalist id="brand_list_opt">
                                            @foreach($brand as $_brand)
                                                <option value={{$_brand->id}} class="p-4 m-4">{{ $_brand->nama_brand }}</option>
                                            @endforeach
                                        </datalist>
                                    </select>
                                    <label class="form-label" for="brand_id">Brand</label>
                                </div>
                            </div>

                            <div class="ms-md auto pe-md-3 d-flex align-items-center mb-4">
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Harga</label>
                                    <input type="number" name="harga" class="form-control" />
                                </div>
                            </div>

                            <div class="ms-md auto pe-md-3 d-flex align-items-center mb-4">
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Stok</label>
                                    <input type="number" name="stok" class="form-control" />
                                </div>
                            </div>

                            <div class="ms-md auto pe-md-3 d-flex align-items-center mb-4">
                                <div class="input-group input-group-outline form-floating" style="">
                                    <label class="form-label" for="gudang_id">Gudang</label>
                                    <select name="gudang_id" id="gudang_id" class="form-control form-select" list="gudang_list_opt" aria-label="Floating Default label select example">
                                        <datalist id="gudang_list_opt">
                                            @foreach($gudang as $_gudang)
                                                <option value={{$_gudang->id}} class="p-4 m-4">{{ $_gudang->nama_gudang }}</option>
                                            @endforeach
                                        </datalist>
                                    </select>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="sumbit" class="btn btn-primary bg-gradient-primary">Submit</button>
                                <button type="button" class="btn bg-gradient-light" onclick="history.back()">Cancel</button>
                            </div>

                        </form>

                    </div>
                </div>
                <!-- !SECTION: Table Data -->

            </div>
        </div>
    </div>
</div>
@endsection
