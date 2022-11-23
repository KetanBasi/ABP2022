<html>
    <head>
        <title>Create Gudang</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
            .cf {
                max-width: 500px;
            }
        </style>
    </head>

    <body>
        @include('shared.hidden_svg')
        @include('shared.navbar', ['nav_gudang' => 'active'])

        <div class="container">
            @include('shared.alert')

            <div class="cf container-sm border p-3 rounded m-auto">
                <form action="/gudang" method="POST" class="">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Gudang</label>
                        <input type="text" name="nama_gudang" class="form-control" placeholder="Gudang A#001"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Jl. x Rt.0 Rw.0 Kec. A, Kel. B, Kota C" min="0"/>
                    </div>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-light" onclick="history.back()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        @include('shared.js_sweetalert2')
        @include('shared.js_bootstrap')
    </body>
</html>
