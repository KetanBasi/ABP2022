<p>Total Stok Produk: {{$item->jumlah_stok}}</p>

<hr>

<p>Produk:</p>
<table class="table table-bordered">
    <thead class="table-dark">
        <th>Produk</th>
        <th>Brand</th>
        <th>Harga</th>
        <th>Stok</th>
    </thead>
    <tbody>
        @foreach ($item->produk as $produk)
            <tr>
                <td>{{ $produk->nama_produk }}</td>
                <td>{{ $produk->brand->nama_brand }}</td>
                <td>{{ $produk->harga }}</td>
                <td>{{ $produk->stok }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
