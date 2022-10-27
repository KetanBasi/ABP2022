<html>
    <head>
        <title>Gudang</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
            /* table, th, td {
                border: 1px solid black;
            } */
            th:nth-child(2), td:nth-child(2) {
                min-width:50px;
                width: max-content;
            }
            th, td:nth-child(3) {
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
                                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#g{{$item->id}}{{$item->nama_gudang}}">
                                            Detail
                                        </a>
                                        <a href="/gudang/edit/{{$item->id}}" onclick="" class="btn btn-warning">Edit</a>
                                        <a onclick="cod('{{$item->id}}')" class="btn btn-danger">Delete</a>
                                    </div>

                                    <div class="modal fade" tabindex="-1" id="g{{ $item->id }}{{ $item->nama_gudang }}" aria-labelledby="{{ $item->id }}{{ $item->nama_gudang }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fs-5" id="{{ $item->id }}{{ $item->nama_gudang }}Label">Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @include('gudang.components.modal_details')
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
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
                        document.location = `/gudang/delete/${id}`;
                    }
                })
            }
        </script>
        @include('shared.js_sweetalert2')
        @include('shared.js_bootstrap')
    </body>
</html>
