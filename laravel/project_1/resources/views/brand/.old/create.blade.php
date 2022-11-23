<html>
    <head>
        <title>Create Brand</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
            .cf {
                max-width: 500px;
            }
        </style>
    </head>

    <body>
        @include('shared.hidden_svg')
        @include('shared.navbar', ['nav_brand' => 'active'])

        <div class="container">
            @include('shared.alert')

            <div class="cf container-sm border p-3 rounded m-auto">
                <form action="/brand" method="POST" class="">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Brand</label>
                        <input type="text" name="nama_brand" class="form-control" placeholder="Aque"/>
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
