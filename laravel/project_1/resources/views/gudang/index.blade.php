<!DOCTYPE html>
<html>
    <head>
        <title>Gudang</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <style>
            /* table, th, td {
                border: 1px solid black;
            } */
            th:nth-child(2), td:nth-child(2) {
                min-width:50px;
                width: max-content;
            }
            th, td:last-child {
                text-align: center;
            }
            /* td:nth-child(2) {
                text-align: right;
            } */
        </style>
    </head>
    <body class="">
        @include('shared.hidden_svg')
        @include('shared.navbar', ['nav_gudang' => 'active'])

        <div class="container">
            @include('shared.alert')

            <a href="/gudang/create" class="">
                <button type="button" class="btn btn-primary mb-3">+ Add Gudang</button>
            </a>

            @if (count($list) > 0)
                <table class="table table-bordered">
                    @csrf
                    <thead class="table-dark">
                        <th>Nama Gudang</th>
                        <th>Alamat</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td>{{ $item->nama_gudang }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>

                                    {{-- * Buttons --}}
                                    <div class="btn-group">
                                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#item_modal" onclick="showDetails({{$item->id}})">Detail</a>
                                        <a href="/gudang/edit/{{$item->id}}" class="btn btn-warning">Edit</a>
                                        <a onclick="cod('{{$item->id}}')" class="btn btn-danger">Delete</a>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                @include('shared.no_items')
            @endif

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

        </div>

        <script>
            function showDetails(id) {
                var detail_url = document.location + "/detail/" + id;
                $.get(detail_url, function (data, status) {
                    console.log(status);
                    console.log(data);
                    $('#item_modal__title'      ).text(`Detail of Gudang ${data['nama_gudang']}`);
                    $('#item_modal__alamat'     ).text(` ${data['alamat'] || ''}`);
                    $('#item_modal__jumlah_stok').text(` ${data['jumlah_stok'] || 0}`);
                    // $('#item_modal__edit'       ).attr('href', `/gudang/edit/${data['id']}`);

                    table_val = "";
                    data['produk'].forEach(produk => {
                        table_val += `
                            <tr kdata_id="${produk['id']}">
                                <td>${ produk['nama_produk'] || '' }</td>
                                <td>${ produk['brand']['nama_brand'] || '' }</td>
                                <td>${ produk['harga'] || 0 }</td>
                                <td>${ produk['stok'] || 0 }</td>
                            </tr>`;
                    });
                    $('#item_modal__table_body').html(table_val);
                    if (data['produk'].length > 0){
                        $('#item_modal__table' ).removeClass('d-none');
                        $('#item_modal__tempty').addClass('d-none');
                    } else {
                        $('#item_modal__table' ).addClass('d-none');
                        $('#item_modal__tempty').removeClass('d-none');
                    };
                });
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
                        document.location = `/gudang/delete/${id}`;
                    }
                })
            }
        </script>
        @include('shared.js_sweetalert2')
        @include('shared.js_bootstrap')
    </body>
</html>
