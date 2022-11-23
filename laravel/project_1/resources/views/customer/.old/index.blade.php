<html>
    <head>
        <title>List Customer</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
            th, td:last-child {
                text-align: center;
            }
            td:nth-child(3) {
                filter: blur(3px);
                transition-duration: 0.2s;
            }
            td:nth-child(3):hover {
                filter: none;
            }
            /* td:nth-child(2) {
                text-align: right;
            } */
        </style>
    </head>
    <body class="">
        @include('shared.hidden_svg')
        @include('shared.navbar', ['nav_customer' => 'active'])

        <div class="container">
            @include('shared.alert')

            <a href="/customer/create" class="">
                <button type="button" class="btn btn-primary mb-3">+ Add Customer</button>
            </a>

            @if (count($list) > 0)
                <table class="table table-bordered">
                    @csrf
                    <thead class="table-dark">
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>No. HP</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td>{{ $item->nama_customer }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/customer/edit/{{$item->id}}" onclick="" class="btn btn-warning">Edit</a>
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
                        document.location = `/customer/delete/${id}`;
                    }
                })
            }
        </script>
        @include('shared.js_sweetalert2')
        @include('shared.js_bootstrap')
    </body>
</html>
