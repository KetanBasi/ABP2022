<html>
    <head>
        <title>index</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
            .cf {
                max-width: 500px;
            }
        </style>
    </head>

    <body>
        @include('shared.navbar')

        <div class="cf container-sm border p-3 rounded m-auto">
            <form action="/brand" method="POST" class="">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Brand</label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Cap Kaki Lima"/>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-light" onclick="history.back()">Cancel</button>
                </div>
            </form>
        </div>
        <script src="sweetalert2.all.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>
