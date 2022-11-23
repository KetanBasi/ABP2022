<!DOCTYPE html>
<html>
    <head>
        <title>Produk</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
            .cf {
                max-width: 500px;
            }
        </style>
    </head>

    <body>
        @include('shared.hidden_svg')
        @include('shared.navbar', ['nav_produk' => 'active'])

        <div class="container">
            @include('shared.alert')

            <div class="cf container-sm border p-3 rounded">
                <form action="/produk/update/{{$detail->id}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="mb-3">Nama Produk</label>
                        <input type="text" name="nama_produk" value="{{$detail->nama_produk}}" class="form-control"/>
                    </div>

                    <div class="mb-3">
                        <label class="mb-3">Stok</label>
                        <input type="number" name="stok" value="{{$detail->stok}}" class="form-control" min="0"/>
                    </div>

                    <div class="mb-3">
                        <label class="mb-3">Harga</label>
                        <input type="number" name="harga" value="{{$detail->harga}}" class="form-control" min="0"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Brand</label>
                        <select name="brand_id" value="{{$detail->brand->nama_brand}}" class="form-control" list="BrandListOpt">
                            <datalist id="BrandListOpt">
                                @foreach($brand as $_brand)
                                    <option value={{$_brand->id}} {{($_brand->id == $detail->brand_id) ? 'Selected' : ''}}>{{ $_brand->nama_brand }}</option>
                                @endforeach
                            </datalist>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gudang</label>
                        <select name="gudang_id" value="{{$detail->gudang->nama_gudang}}" class="form-control" list="GudangListOpt">
                            <datalist id="GudangListOpt">
                                @foreach($gudang as $_gudang)
                                    <option value={{$_gudang->id}} {{($_gudang->id == $detail->gudang_id) ? 'Selected' : ''}}>{{ $_gudang->nama_gudang }}</option>
                                @endforeach
                            </datalist>
                        </select>
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
