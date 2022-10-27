<!DOCTYPE html>
<html>
    <head>
        <title>Brand</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
        </style>
    </head>

    <body>
        @include('shared.navbar')

        <div class="container">
            @include('shared.alert')

            <a href="/brand/create">
                <button type="button" class="btn btn-primary mb-3">+ Add Item</button>
            </a>

            <table class="table table-bordered">
                @csrf
                <thead class="table-dark">
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_brand }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="/brand/edit/{{$item->id}}" class="btn btn-primary">Edit</a>
                                <a onclick="cod('{{$item->id}}')" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
                        document.location = `/brand/delete/${id}`;
                    }
                })
            }
        </script>
    </body>
</html>
