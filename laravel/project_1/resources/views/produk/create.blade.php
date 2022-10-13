<html>
    <head>
        <title>index</title>
    </head>

    <body>
        <form action="/produk" method="POST">
            @csrf
            <label>Nama Produk</label>
            <input type="text" name="nama_produk"/>

            <label>Stok</label>
            <input type="text" name="stok"/>

            <button type="submit">Submit</button>
        </form>
    </body>
</html>
