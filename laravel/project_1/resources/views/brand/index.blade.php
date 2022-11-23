@extends('main')

{{-- SECTION: Variables --}}
@section('breadcrumb_current_location', 'Brand'     )
@section('table_title'                , 'List Brand')
{{-- !SECTION: Variables --}}

{{-- SECTION: Override --}}

{{-- ANCHOR: CSS Header --}}
@section('header_includes')
    @parent
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection

{{-- ANCHOR: Navigation --}}
@section('nav_list')
    @include('base.components.nav_list', ['active' => 'brand'])
@endsection

{{-- ANCHOR: Main Content --}}
@section('main_content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">

                    <!-- ANCHOR: Table Title -->
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg p-4 row justify-content-between d-flex">
                            <h6 class="text-white text-capitalize col-4 m-0 lh-1 align-self-center">@yield('table_title')</h6>
                            <a  class="btn bg-gradient-light border-radius-lg p-2 m-0 col-1 font-weight-bold text-primary position-absolute align-self-center end-0" href="/gudang/create" onclick="" style="width: max-content;">
                                + Add Brand
                            </a>
                        </div>
                    </div>

                    <!-- SECTION: Table Data -->
                    <div class="card-body px-0 pb-2">

                        <div class="container-fluid py-0">
                            @include('shared.alert')
                        </div>

                        <div class="table-responsive p-0">

                            {{-- NOTE: Inline style used for hide empty line caused by '@csrf' --}}
                            <table class="table align-items-center mb-0" style="position: relative; top: -1px;">
                                @csrf

                                <!-- ANCHOR: Table Header -->
                                @section('table_header')
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Brand</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Produk</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Gudang</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                @show
                                {{-- @endsection --}}


                                <!-- SECTION: Table Content -->
                                @section('table_content')
                                    <tbody>

                                        {{-- <tr>

                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('img/team-2.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">John Michael</h6>
                                                        <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">Manager</p>
                                                <p class="text-xs text-secondary mb-0">Organization</p>
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-success">Online</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                            </td>

                                            <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td>

                                        </tr> --}}

                                        @foreach(($list ?? []) as $item)
                                            <tr>

                                                <!-- ANCHOR: Col. 1 - Nama Brand -->
                                                <td>
                                                    <div class="d-flex px-2 py-1">

                                                        <!-- ANCHOR: Img Produk -->
                                                        <div>
                                                            <img src="{{ asset('img/team-2.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                        </div>

                                                        <!-- ANCHOR: Produk Data -->
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $item->nama_brand }}</h6>
                                                            {{-- <p class="text-xs text-secondary mb-0">{{ $item->brand->nama_brand ?? '' }}</p> --}}
                                                        </div>

                                                    </div>
                                                </td>

                                                <!-- ANCHOR: Col. 2 - Total Produk -->
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm {{$item->jumlah_produk > 0 ? 'bg-gradient-success' : 'bg-gradient-secondary' }}">{{ $item->jumlah_produk }}</span>
                                                    {{-- <p class="text-xs text-secondary mb-0">Total: {{ $item->harga * $item->stok }}</p> --}}
                                                </td>

                                                <!-- ANCHOR: Col. 3 - Total Gudang -->
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-primary">{{ $item->gudang->unique()->count() }}</span>
                                                </td>

                                                <!-- ANCHOR: Col. 4 - Actions -->
                                                <td class="align-middle">
                                                    {{-- <a href="javascript:;" class="text-secondary font-weight-bold text-xs">
                                                        Edit
                                                    </a> --}}
                                                    <a class="btn bg-gradient-warning border-radius-lg p-2 text-light text-xs" href="/brand/edit/{{$item->id}}" onclick="">Edit</a>
                                                    <a class="btn bg-gradient-danger border-radius-lg p-2 text-light text-xs" onclick="cod('{{$item->id}}')">Delete</a>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                @show
                                {{-- @endsection --}}
                                <!-- !SECTION: Table Content -->

                            </table>
                        </div>
                    </div>
                    <!-- !SECTION: Table Data -->

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" id="item_modal" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="item_modal__title">Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Alamat:
                        <span id="item_modal__alamat"></span>
                    </p>
                    <p>Total Stok Produk:
                        <span id="item_modal__jumlah_stok"></span>
                    </p>

                    <hr>

                    <div id="item_modal__table">
                        <p>Produk:</p>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <th>Produk</th>
                                <th>Brand</th>
                                <th>Harga</th>
                                <th>Stok</th>
                            </thead>
                            <tbody id="item_modal__table_body">
                            </tbody>
                        </table>
                    </div>

                    <div id="item_modal__tempty" class="text-center">
                        @include('shared.no_items')
                    </div>

                </div>
                {{-- <div class="modal-footer">
                    <a id="item_modal__edit" href="" class="btn btn-warning">Edit</a>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div> --}}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @parent

    <script>
        function cod(id) {
            Swal.fire({
                title: "Hapus item?",
                text: "Item tidak dapat dikembalikan setelah dihapus",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ye"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire (
                        "Deleted!",
                        "Item telah dihapus.",
                        "Success"
                    );
                    document.location = `/brand/delete/${id}`;
                }
            })
        }
    </script>
@endsection

{{-- !SECTION: Override --}}
