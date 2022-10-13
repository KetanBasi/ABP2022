<html>
    <head>
        <title>List Produk</title>
    </head>
    <body>
        <a href="/produk/create/">Add Produk</a>
        <table>
            <thead>
                <th>Nama Produk</th>
                <th>Stok</th>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->stok }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
