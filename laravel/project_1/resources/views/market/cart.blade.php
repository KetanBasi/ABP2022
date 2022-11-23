@extends('main')

{{-- SECTION: Variables --}}
@section('breadcrumb_current_location', 'Market'     )
@section('table_title'                , 'Keranjang Belanja'.((($customer->nama_customer ?? '') != '') ? ' ' : '' ).($customer->nama_customer ?? ''))
{{-- !SECTION: Variables --}}

{{-- SECTION: Override --}}

{{-- ANCHOR: Navigation --}}
@section('nav_list')
    @include('base.components.nav_list', ['active' => 'market'])
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
                        </div>
                    </div>

                    <!-- SECTION: Table Data -->
                    <div class="card-body px-0 pb-2">

                        <div class="align-self-center p-3">
                            <a  class="btn bg-gradient-primary border-radius-lg p-2 m-0 col-1 font-weight-bold" style="width: max-content;" href="/market" onclick="">
                                Back to Market
                            </a>
                            <a  class="btn bg-gradient-{{ (count($orders) > 0) ? 'success' : 'secondary disabled' }} border-radius-lg p-2 m-0 col-1 font-weight-bold" style="width: max-content;" onclick="checkout_cart()">
                                Checkout
                            </a>
                            <a  class="btn bg-gradient-{{ (count($orders) > 0) ? 'danger' : 'secondary disabled' }} border-radius-lg p-2 m-0 col-1 font-weight-bold" style="width: max-content;" onclick="reset_cart()">
                                Empty Cart
                            </a>
                        </div>

                        <div class="container-fluid py-0">
                            @include('shared.alert')
                        </div>

                        <div class="container-fluid p-3">
                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <p>
                                        <span class="badge bg-gradient-{{ (($orders->count ?? 0) > 0) ? 'info' : 'secondary' }}">{{ $orders->count }}</span>
                                        Items
                                    </p>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <p>
                                        Total Ordered Items:
                                        <span class="badge bg-gradient-{{ (($orders->count ?? 0) > 0) ? 'info' : 'secondary' }}">{{ $orders->total_item }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <p>
                                        Total Price
                                        <span class="badge bg-gradient-{{ (($orders->count ?? 0) > 0) ? 'info' : 'secondary' }}">{{ $orders->sum }}</span>
                                    </p>
                                </div>
                            </div>
                            {{--  --}}
                        </div>

                        <div class="table-responsive p-0">

                            @if (count($orders) > 0)

                                {{-- NOTE: Inline style used for hide empty line caused by '@csrf' --}}
                                <table class="table align-items-center mb-0" style="position: relative; top: -1px;">
                                    @csrf

                                    <!-- ANCHOR: Table Header -->
                                    @section('table_header')
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Produk</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Harga</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subtotal</th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                    @show
                                    {{-- @endsection --}}


                                    <!-- SECTION: Table Content -->
                                    @section('table_content')
                                        <tbody>

                                                @foreach(($orders ?? []) as $order)
                                                    <tr>

                                                        <!-- ANCHOR: Col. 1 - Nama Produk -->
                                                        <td>
                                                            <div class="d-flex px-2 py-1">

                                                                <!-- ANCHOR: Img Produk -->
                                                                <div>
                                                                    <img src="{{ asset('img/team-2.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                                </div>

                                                                <!-- ANCHOR: Produk Data -->
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">{{ $order->detail->produk->nama_produk ?? 'Product Name' }}</h6>
                                                                    <p class="text-xs text-secondary mb-0">{{ $order->detail->produk->brand->nama_brand ?? 'Item Brand' }}</p>
                                                                </div>

                                                            </div>
                                                        </td>

                                                        <!-- ANCHOR: Col. 2 - Harga -->
                                                        <td>
                                                            <div class="align-middle text-center text-sm">
                                                                <p class="text-xs font-weight-bold mb-0">{{ $order->detail->produk->harga ?? 0 }}</p>
                                                                {{-- <p class="text-xs text-secondary mb-0">Total: {{ $item->harga * $item->stok }}</p> --}}
                                                            </div>
                                                        </td>

                                                        <!-- ANCHOR: Col. 3 - Jumlah -->
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="badge badge-sm bg-gradient-{{($order->detail->qty ?? 0) > 0 ? 'success' : 'secondary' }}">{{ $order->detail->qty ?? 0 }}</span>
                                                        </td>

                                                        <!-- ANCHOR: Col. 4 - Subtotal -->
                                                        <td class="align-middle text-center">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <p class="text-sm mb-0 font-weight-bold">{{ ($order->detail->produk->harga ?? 0) * ($order->detail->qty ?? 0) }}</p>
                                                                {{-- <p class="text-xs mb-0 text-secondary">{{ $item->gudang->alamat ?? '' }}</p> --}}
                                                            </div>
                                                        </td>

                                                        <!-- ANCHOR: Col. 5 - Actions -->
                                                        <td class="align-middle">
                                                            {{-- <a href="javascript:;" class="text-secondary font-weight-bold text-xs">
                                                                Edit
                                                            </a> --}}
                                                            <a class="btn bg-gradient-warning border-radius-lg p-2 text-light text-xs" onclick="update({{ $order->detail->produk_id }}, {{ $order->id }})"
                                                                data-bs-toggle="modal" data-bs-target="#edit-order">Update</a>
                                                            <a class="btn bg-gradient-danger border-radius-lg p-2 text-light text-xs" onclick="cod('{{ $order->id }}')">Delete</a>
                                                        </td>

                                                    </tr>
                                                @endforeach

                                        </tbody>
                                    @show
                                    {{-- @endsection --}}
                                    <!-- !SECTION: Table Content -->

                                </table>

                            @else

                                <div class="container-fluid text-center">

                                    @include('shared.no_items')

                                </div>

                            @endif
                        </div>
                    </div>
                    <!-- !SECTION: Table Data -->

                </div>
            </div>
        </div>
    </div>


    {{-- SECTION: Modal Edit Order --}}
    <div class="modal fade" id="edit-order" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title" id="edit-order--title">Add Product to Cart</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <img id="edit-order--image" class="card-img-top img-fluid" src="{{ asset('img/product-12.jpg') }}" alt="">

                    <div class="container mt-3">

                        <form action="/market/cart/{{ $customer->id }}/update" method="POST" id="edit-order--form" class="mb-0 p-3">
                            @csrf

                            <input type="hidden" name="produk_id" id="edit-order--id" />
                            <input type="hidden" name="order_id" id="edit-order--order-id" />

                            <div class="ms-md auto pe-md-3 d-flex align-items-center mb-4">
                                <div class="input-group input-group-static is-filled">
                                    <label class="form-label">Nama Produk</label>
                                    <input type="text" name="nama_produk" id="edit-order--name" class="form-control" disabled />
                                </div>
                            </div>

                            <div class="ms-md auto pe-md-3 d-flex align-items-center mb-4">
                                <div class="input-group input-group-static is-filled">
                                    <label class="form-label">Brand</label>
                                    <input type="text" name="nama_brand" id="edit-order--brand" class="form-control" disabled />
                                </div>
                            </div>

                            <div class="ms-md auto pe-md-3 d-flex align-items-center mb-4">
                                <div class="input-group input-group-static is-filled">
                                    <label class="form-label">Jumlah</label>
                                    <input type="number" name="qty" id="edit-order--qty" class="form-control" />
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" form="edit-order--form" id="edit-order--btn-add" class="btn bg-gradient-secondary disabled">Update</button>
                    <button type="button" form="edit-order--form" id="edit-order--btn-close" class="btn btn-link ml-auto" data-bs-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>
    {{-- !SECTION: Modal Edit Order --}}

@endsection

@section('scripts')
    @parent

    <script>
        function update(id, order_id) {
            if (id < 0) return;

            $('#edit-order--title').text(`Getting your data...`);
            $('#edit-order--image').attr("src", "");
            $('#edit-order--image').attr("alt", "");
            $('#edit-order--name' ).attr('value', '');
            $('#edit-order--brand').attr('value', '');

            console.log(`id: ${id}`);

            var detail_url = document.location.origin + "/market/detail/" + id;

            $.get(detail_url, function (data, status) {
                if (status !== 'success') {
                    console.log(status);
                    return;
                }

                console.log(data);

                $('#edit-order--title'   ).text(`Add ${data['nama_produk'] || ''} to cart`);
                $('#edit-order--image'   ).attr("src", "{{ asset('img/product-12.jpg') }}");
                $('#edit-order--image'   ).attr("alt", `${data['nama_produk'] || ''}`);
                $('#edit-order--brand'   ).attr('value', data['brand']['nama_brand']);
                $('#edit-order--id'      ).attr('value', data['id']);
                $('#edit-order--order-id').attr('value', order_id);
                $('#edit-order--name'    ).attr('value', data['nama_produk']);

                if (data['stok'] > 0) {
                    $('#edit-order--qty'    ).attr('min', 1);
                    $('#edit-order--qty'    ).attr('max', data['stok']);
                    $('#edit-order--qty'    ).attr('value', 1);
                    $('#edit-order--btn-add').attr("onclick", `add(${data['id']})`);
                    $('#edit-order--btn-add').removeClass('bg-gradient-secondary');
                    $('#edit-order--btn-add').removeClass('disabled');
                    $('#edit-order--btn-add').addClass('bg-gradient-primary');
                } else {
                    $('#edit-order--qty'    ).attr('min', 0);
                    $('#edit-order--qty'    ).attr('max', 0);
                    $('#edit-order--qty'    ).attr('value', 0);
                    $('#edit-order--btn-add').attr("onclick", '');
                    $('#edit-order--btn-add').removeClass('bg-gradient-primary');
                    $('#edit-order--btn-add').addClass('bg-gradient-secondary');
                    $('#edit-order--btn-add').addClass('disabled');
                }

            });
        }

        function store(id) {
            var store_url = document.location + '/update/' + id;
        }

        function checkout_cart() {
            var checkout_url = document.location + '/checkout';
            window.location.replace(checkout_url);
        }

        function reset_cart() {
            var reset_url = document.location + '/reset';
            window.location.replace(reset_url);
        }

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
                    /// market/cart/{uid}/delete/{id}
                    document.location = document.location + '/delete/' + id;
                }
            })
        }
    </script>
@endsection

{{-- !SECTION: Override --}}
