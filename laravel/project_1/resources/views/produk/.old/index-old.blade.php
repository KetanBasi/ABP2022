<html>
    <head>
        <title>List Produk</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
            td:nth-child(2) {
                text-align: right;
            }
        </style>
    </head>
    <body class="">
        @include('shared.hidden_svg')

        @include('shared.navbar', ['nav_produk' => 'active'])

        <div class="container">
            @include('shared.alert')

            <a href="/produk/create" class="">
                <button type="button" class="btn btn-primary mb-3">+ Add Item</button>
            </a>

            @if (count($list) > 0)
                <table class="table table-bordered">
                    @csrf
                    <thead class="table-dark">
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Brand</th>
                        <th>Gudang</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td>{{ $item->nama_produk }}</td>
                                <td>{{ $item->stok }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->brand->nama_brand ?? '' }}</td>
                                <td>{{ $item->gudang->nama_gudang ?? '' }}</td>
                                {{-- <td>
                                    @php
                                        $_nama_brand = app\Http\Controllers\ProdukController::get_brand($item->brand_id, 'nama_brand');
                                    @endphp
                                    {{ $_nama_brand }}
                                </td>
                                <td>
                                    @php
                                        $_nama_gudang = app\Http\Controllers\ProdukController::get_gudang($item->gudang_id, 'nama_gudang');
                                    @endphp
                                    {{ $_nama_gudang }}
                                </td> --}}
                                <td>
                                    <div class="btn-group">
                                        <a href="/produk/edit/{{$item->id}}" onclick="" class="btn btn-warning">Edit</a>
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
        </div>
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
                        document.location = `/produk/delete/${id}`;
                    }
                })
            }
        </script>
        @include('shared.js_sweetalert2')
        @include('shared.js_bootstrap')
    </body>
</html>
