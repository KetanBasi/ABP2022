<!DOCTYPE html>
<html>
    <head>
        <title>ABP Minggu 2</title>
        <link rel="stylesheet" href="style/hello-world.css">
    </head>
    <body>
        <h1>ABP Minggu 2</h1>
        <p style="font-size: 40px" class="paragraf" id="pro">
            E
        </p>
        <p id="pro" style="background-color: rgb(210, 126, 126); font-size: 20px">
            E
        </p>
        <p class="paragraf">
            E
        </p>

        <a href="#">Halo dunia</a>

        <p class="firstline">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet nibh id eros placerat pharetra. Ut dolor ipsum, bibendum sed accumsan id, sodales id ex. Quisque sit amet tellus feugiat, porta lorem sit amet, laoreet erat. Phasellus porta venenatis ipsum et sollicitudin. Quisque auctor pretium sapien eget facilisis. Morbi fermentum varius velit, sed tincidunt velit porttitor eget. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras mi massa, luctus sed nisl porta, dignissim ultricies neque. Morbi vel porttitor risus, et vestibulum orci. Nullam vel felis sed lacus semper scelerisque. Sed id gravida nibh. Morbi in commodo sapien. Nulla ac dapibus tortor, sit amet mollis massa. 
        </p>

        <!-- * Tabel -->

        <table>
            <tr>
                <td>Month</td>
                <td>Duid</td>
            </tr>
            <tr>
                <td>Januari</td>
                <td>5.000</td>
            </tr>
            <tr>
                <td>Januari</td>
                <td>50.000</td>
            </tr>
            <tr>
                <td>Januari</td>
                <td>500.000</td>
            </tr>
        </table>

        <!-- * List -->

        <h3>Nama Mahasiswaaa</h3>
        <ul>
            <li>Udin</li>
            <li>Paijo</li>
            <li>Bambang</li>
        </ul>
        
        <ol>
            <li>Udin</li>
            <li>Paijo</li>
            <li>Bambang</li>
            <ul>
                <li>Udin</li>
                <li>Paijo</li>
                <li>Bambang</li>
            </ul>
        </ol>

        <!-- * Form -->

        <form method="post" action="">
            <fieldset>
                <legend>Filed Tambah Producc</legend>
                <div>
                    <label for="form_1">Nama Produk:</label>
                    <input type="text" placeholder="Susu Murni" name="nama_produk" value="">
                </div>
                <div>
                    <label for="form_1">Jumlah Produk:</label>
                    <input type="number" placeholder="1" name="jumlah_produk" value="">
                </div>
                <div>
                    <button type="submit">Submit</button>
                </div>
            </fieldset>
        </form>
        
        <script>
            var nama = ["Djoe", "Noe"];
            alert("Hello " + nama[0]);
        </script>
    </body>

    <?php
        print_r($_POST);
    ?>
</html>