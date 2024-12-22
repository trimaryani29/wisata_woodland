<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woodland Kuningan</title>
    <link rel="stylesheet" href="style2.css">
    <style>

    </style>
</head>
<body>
    <header>
        <!--- Beranda --->
        <div class="logo">
            <div class="logo">
                <img src="images/logo.png">
            </div>
        </div>
        <nav>
            <ul>
                <li><a href='index.php' class="active">Beranda</a></li>
                <li><a href="#pemesanan">Pemesanan</a></li>
                <li><a href="#kontak">Kontak</a></li>
            </ul>
        </nav>
    </header>
    <?php
    $host = 'localhost';
    $db = 'wisata';
    $user = 'root';
    $pass = '';
    
    $conn = mysqli_connect($host, $user, $pass, $db);

    $id_pemesanan = htmlentities($_GET['id']);

    $sql = "SELECT * FROM pesanan where id = '$id_pemesanan'";

    $query = mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)==0)
    {
        echo 'tidak ada'; exit;
    }else{
        $detail = mysqli_fetch_row($query);
    ?>
    <!--- Form Pemesanan --->
    <div id="pemesanan" class="container" style="height: 100%;">
        <h2>Invoice Pemesanan #<?= $detail[0]?></h2>
    <form id="formPemesanan" action="proses.php" method="POST">
        <label for="nama">Nama: <p><?= $detail[1]?></p></label>

        <label for="no_hp">Nomor HP: <p><?= $detail[2]?></p></label>

        <label for="tanggal">Tanggal Pemesanan: <p><?= $detail[3]?></p></label>

        <label>Pilih Wahana: <p><?= $detail[4]?></p></label>
        

        <label for="jumlah">Jumlah Orang: <p><?= $detail[5]?></p></label>

        <label for="harga">Harga per Paket: <p>Rp. <?= number_format($detail[6],0,',','.')?></p></label>

        <label for="total_harga">Total Harga: <p>Rp. <?= number_format($detail[7], 0 , ',', '.')?></p></label>

        <label for="created_at">Tanggal Pemesanan: <p><?= $detail[8]?></p></label>

        <button type="submit" onclick="window.print()">Cetak Invoice</button>
    </form>
    </div><?php } ?>

    <!--- JavaScript --->
    <script>
    function toggleSubPaketJeep() {
        const jeepCheckbox = Array.from(document.querySelectorAll(".paket")).find(checkbox => checkbox.value === "Jeep Adventure");
        const subPaketJeepContainer = document.getElementById("subPaketJeepContainer");
        
        subPaketJeepContainer.style.display = jeepCheckbox.checked ? "block" : "none";

        if (!jeepCheckbox.checked) {
            Array.from(document.querySelectorAll(".subPaketJeep")).forEach(subCheckbox => {
                subCheckbox.checked = false;
            });
        }
        updateHarga();
    }

    function updateHarga() {
        const tanggalInput = document.getElementById("tanggal");
        const jumlahInput = document.getElementById("jumlah");
        const hargaInput = document.getElementById("harga");
        const totalHargaInput = document.getElementById("total_harga");

        const tanggalValue = tanggalInput.value;
        let hari = null;

        if (tanggalValue) {
            const tanggal = new Date(tanggalValue);
            hari = tanggal.getDay(); // 0 (Minggu) hingga 6 (Sabtu)
        }

        let totalHargaPerPaket = 0;

        Array.from(document.querySelectorAll(".paket:checked")).forEach(checkbox => {
            if (checkbox.value === "Rainbow Slide") {
                const weekdayHarga = parseInt(checkbox.getAttribute("data-weekday")) || 0;
                const weekendHarga = parseInt(checkbox.getAttribute("data-weekend")) || 0;
                totalHargaPerPaket += (hari === 0 || hari === 6) ? weekendHarga : weekdayHarga;
            } else if (checkbox.value === "Flying Fox") {
                totalHargaPerPaket += parseInt(checkbox.getAttribute("data-harga")) || 0;
            }
        });

        Array.from(document.querySelectorAll(".subPaketJeep:checked")).forEach(subCheckbox => {
            totalHargaPerPaket += parseInt(subCheckbox.getAttribute("data-harga")) || 0;
        });

        const jumlahOrang = parseInt(jumlahInput.value) || 0;
        const totalHarga = totalHargaPerPaket * jumlahOrang;

        hargaInput.value = totalHargaPerPaket.toString();
        totalHargaInput.value = totalHarga.toString();
    }
    </script>

</body>
</html>