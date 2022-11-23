@extends('gudang.index')

@section('form_title', 'Edit Gudang')

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

                        <form action="/gudang/update/{{$detail->id}}" method="POST" class="align-items-center mb-0 p-3" style="">
                            @csrf

                            <div class="ms-md auto pe-md-3 d-flex align-items-center mb-4">
                                <div class="input-group input-group-outline is-filled">
                                    <label class="form-label">Nama Gudang</label>
                                    <input type="text" name="nama_gudang" value="{{$detail->nama_gudang}}" class="form-control" />
                                </div>
                            </div>

                            <div class="ms-md auto pe-md-3 d-flex align-items-center mb-4">
                                <div class="input-group input-group-outline is-filled">
                                    <label class="form-label">Alamat Gudang</label>
                                    <input type="text" name="alamat" value="{{$detail->alamat}}" class="form-control" />
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
