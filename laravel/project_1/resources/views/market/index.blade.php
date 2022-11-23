@extends('main')

{{-- SECTION: Variables --}}
@section('breadcrumb_current_location', 'Market'     )
{{-- !SECTION: Variables --}}

{{-- SECTION: Override --}}

{{-- ANCHOR: Navigation --}}
@section('nav_list')
    @include('base.components.nav_list', ['active' => 'market'])
@endsection

{{-- SECTION: Main Content --}}
@section('main_content')

    <div class="container-fluid mb-3">
    </div>

    <div class="container-fluid py-0">
        @include('shared.alert')
    </div>

    <div class="container-fluid align-content-center">

        <div class="container-fluid py-4 d-flex">
            <button class="btn btn-primary d-flex flex-row" data-bs-toggle="modal" data-bs-target="#cart-select">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">shopping_cart</i>
                </div>

                <span class="nav-link-text ms-1">Cart</span>
            </button>
        </div>

        <div class="container-fluid py-4 d-flex flex-row flex-wrap justify-content-center">

            @if(count($products) > 0)

                @foreach(($products ?? []) as $product)

                    {{-- SECTION: Product Card --}}
                    <div class="card d-flex flex-md-shrink-1 me-3 mb-3" style="min-height: 300px; width: 18rem">
                        <img class="card-img-top" src="{{ asset('img/product-12.jpg') }}" alt="{{ $product->nama_produk ?? '' }}" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nama_produk ?? '' }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $product->brand->nama_brand ?? '' }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $product->harga ?? '' }}</h6>

                            {{-- <p class="card-text">Product Info Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta beatae error repellat impedit soluta dolore natus odio. Quo labore neque tempore obcaecati et exercitationem modi adipisci, sequi enim fuga commodi?</p> --}}

                            <a class="btn btn-{{ ($product->stok ?? 0) ? 'primary' : 'secondary disabled' }}" onclick="add({{ $product->id ?? -1}})"
                                data-bs-toggle="modal" data-bs-target="#product-add">Add to Cart</a>
                            <a class="btn btn-primary" onclick="product_detail({{ $product->id ?? -1}})" data-bs-toggle="modal" data-bs-target="#product-info">Detail</a>
                        </div>
                    </div>
                    {{-- !SECTION: Product Card --}}

                @endforeach

            @else

                <div class="container-fluid text-center">

                    @include('shared.no_items')

                </div>

            @endif

        </div>
    </div>

    {{-- SECTION: Modal Product Info --}}
    <div class="modal fade" id="product-info" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title" id="product-detail--title">Product Detail</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <img id="product-detail--image" class="card-img-top img-fluid" src="{{ asset('img/product-12.jpg') }}" alt="">

                    <div class="container mt-3">
                        <h5 id="product-detail--brand">Brand</h5>

                        <p>
                            Harga:
                            <span id="product-detail--harga">0</span>
                        </p>
                        <p>
                            Stok:
                            <span id="product-detail--stok">0</span>
                        </p>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="product-detail--btn-add" class="btn bg-gradient-secondary disabled" onclick="">Add to Cart</button>
                    <button type="button" id="product-detail--btn-close" class="btn btn-link ml-auto" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    {{-- !SECTION: Modal Product Info --}}

    {{-- SECTION: Modal Add to Cart --}}
    <div class="modal fade" id="product-add" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title" id="product-add--title">Add Product to Cart</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <img id="product-add--image" class="card-img-top img-fluid" src="{{ asset('img/product-12.jpg') }}" alt="">

                    <div class="container mt-3">

                        <form action="/market" method="POST" id="product-add--form" class="mb-0 p-3">
                            @csrf

                            <input type="hidden" name="produk_id" id="product-add--id" />

                            <div class="ms-md auto pe-md-3 d-flex align-items-center mb-4">
                                <div class="input-group input-group-static is-filled">
                                    <label class="form-label">Nama Produk</label>
                                    <input type="text" name="nama_produk" id="product-add--name" class="form-control" disabled />
                                </div>
                            </div>

                            <div class="ms-md auto pe-md-3 d-flex align-items-center mb-4">
                                <div class="input-group input-group-static is-filled">
                                    <label class="form-label">Brand</label>
                                    <input type="text" name="nama_brand" id="product-add--brand" class="form-control" disabled />
                                </div>
                            </div>

                            <div class="ms-md auto pe-md-3 d-flex align-items-center mb-4">
                                <div class="input-group input-group-static is-filled">
                                    <label class="form-label">Jumlah</label>
                                    <input type="number" name="qty" id="product-add--qty" class="form-control" />
                                </div>
                            </div>

                            <div class="ms-md auto pe-md-3 d-flex align-items-center mb-4">
                                <div class="input-group input-group-static form-floating" style="">
                                    <select name="customer_id" id="customer_id" class="form-control form-select" list="brand_list_opt" aria-label="Floating Default label select example">
                                        <datalist id="brand_list_opt">
                                            @foreach($customers as $customer)
                                                <option value={{ $customer->id }} class="p-4 m-4">{{ $customer->nama_customer }}</option>
                                            @endforeach
                                        </datalist>
                                    </select>
                                    <label class="form-label" for="customer_id">Customer</label>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" form="product-add--form" id="product-add--btn-add" class="btn bg-gradient-secondary disabled">Add to Cart</button>
                    <button type="button" form="product-add--form" id="product-add--btn-close" class="btn btn-link ml-auto" data-bs-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>
    {{-- !SECTION: Modal Add to Cart --}}

    {{-- SECTION: Modal Select User Cart --}}
    <div class="modal fade" id="cart-select" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title" id="cart-select--title">Select User Cart</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container mt-3">

                        <form id="cart-select--form" class="mb-0 p-3">
                            @csrf

                            <div class="ms-md auto pe-md-3 d-flex align-items-center mb-4">
                                <div class="input-group input-group-static" style="">
                                    <label class="">Customer</label>
                                    <select name="customer_id" id="select_customer_id" class="form-control form-select" list="customer_list_opt" aria-label="Floating Default label select example">
                                        <datalist id="customer_list_opt">
                                            @foreach($customers as $customer)
                                                <option value={{ $customer->id }} class="p-4 m-4">{{ $customer->nama_customer }}</option>
                                            @endforeach
                                        </datalist>
                                    </select>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" form="cart-select--form" id="cart-select--btn-add" class="btn bg-gradient-primary" onclick="get_cart()">Select User Cart</button>
                    <button type="button" form="cart-select--form" id="cart-select--btn-close" class="btn btn-link ml-auto" data-bs-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>
    {{-- !SECTION: Modal Select User Cart --}}

@endsection
{{-- !SECTION: Main Content --}}

@section('custom_js')
    {{-- @parent --}}

    <script>
        function get_cart() {
            var target_url = document.location + '/cart/' + document.getElementById('select_customer_id').value;
            // var form_target = document.getElementById('cart-select--form');
            // form_target.action = target_url;
            window.location.replace(target_url);
        }

        function add(id) {
            if (id < 0) return;

            $('#product-add--title').text(`Getting your data...`);
            $('#product-add--image').attr("src", "");
            $('#product-add--image').attr("alt", "");
            $('#product-add--name' ).attr('value', '');
            $('#product-add--brand').attr('value', '');

            var detail_url = document.location + "/detail/" + id;

            $.get(detail_url, function (data, status) {
                if (status !== 'success') {
                    console.log(status);
                    return;
                }

                console.log(data);

                $('#product-add--title').text(`Add ${data['nama_produk'] || ''} to cart`);
                $('#product-add--image').attr("src", "{{ asset('img/product-12.jpg') }}");
                $('#product-add--image').attr("alt", `${data['nama_produk'] || ''}`);
                $('#product-add--brand').attr('value', data['brand']['nama_brand']);
                $('#product-add--id'   ).attr('value', data['id']);
                $('#product-add--name' ).attr('value', data['nama_produk']);

                if (data['stok'] > 0) {
                    $('#product-add--qty'    ).attr('min', 1);
                    $('#product-add--qty'    ).attr('max', data['stok']);
                    $('#product-add--qty'    ).attr('value', 1);
                    $('#product-add--btn-add').attr("onclick", `add(${data['id']})`);
                    $('#product-add--btn-add').removeClass('bg-gradient-secondary');
                    $('#product-add--btn-add').removeClass('disabled');
                    $('#product-add--btn-add').addClass('bg-gradient-primary');
                } else {
                    $('#product-add--qty'    ).attr('min', 0);
                    $('#product-add--qty'    ).attr('max', 0);
                    $('#product-add--qty'    ).attr('value', 0);
                    $('#product-add--btn-add').attr("onclick", '');
                    $('#product-add--btn-add').removeClass('bg-gradient-primary');
                    $('#product-add--btn-add').addClass('bg-gradient-secondary');
                    $('#product-add--btn-add').addClass('disabled');
                }

            });
        }

        function product_detail(id) {
            if (id < 0) return;

            $('#product-detail--title').text(`Getting your data...`);
            $('#product-detail--image').attr("src", "");
            $('#product-detail--image').attr("alt", "");
            $('#product-detail--brand').text('');
            $('#product-detail--harga').text('0');
            $('#product-detail--stok' ).text('0');
            // $('#product-detail--btn-add' ).addClass('d-none');

            var detail_url = document.location + "/detail/" + id;

            $.get(detail_url, function (data, status) {
                if (status !== 'success') {
                    console.log(status);
                    return;
                }

                console.log(data);

                $('#product-detail--title').text(`${data['nama_produk'] || ''}`);
                $('#product-detail--image').attr("src", "{{ asset('img/product-12.jpg') }}");
                $('#product-detail--image').attr("alt", `${data['nama_produk'] || ''}`);
                $('#product-detail--brand').text(` ${data['brand']['nama_brand']}`);
                $('#product-detail--harga').text(` ${data['harga'] || 0}`);
                $('#product-detail--stok' ).text(` ${data['stok' ] || 0}`);

                if (data['stok'] > 0) {
                    $('#product-detail--btn-add').attr("onclick", `add(${data['id']})`);
                    $('#product-detail--btn-add').removeClass('bg-gradient-secondary');
                    $('#product-detail--btn-add').removeClass('disabled');
                    $('#product-detail--btn-add').addClass('bg-gradient-primary');
                } else {
                    $('#product-detail--btn-add').attr("onclick", '');
                    $('#product-detail--btn-add').removeClass('bg-gradient-primary');
                    $('#product-detail--btn-add').addClass('bg-gradient-secondary');
                    $('#product-detail--btn-add').addClass('disabled');
                }

            });
        }
    </script>

@endsection

{{-- !SECTION: Override --}}
