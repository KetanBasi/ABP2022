<!DOCTYPE html>
<html>
    <head>
        <title>ABP Minggu 1</title>
        <style>
            table, tr, td {
                border: 1px solid #544d66;
            }
            td:nth-child(2) {
                text-align: right;
            }
            #pro {
                color: #79ff6a;
            }
            .paragraf {
                background-color: #544d66;
                color: #e9e9e9;
            }
        </style>
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
    </body>

    <?php
        print_r($_POST);
    ?>
</html>