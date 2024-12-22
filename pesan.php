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
    <main>
        <div id="beranda" class="hero">
            <div class="overlay">
            <div class="hero-section">
                <div class="button-container">
                  <button class="btn eksplor" onclick="window.location.href='https://www.instagram.com/woodlandkuningan';">Eksplor</button>
                  <button class="btn paket" onclick="window.location.href='http://localhost/woodland/pesan.php';">Paket</button>
                </div>
            </div>
            </div>      
        </div>
    </main>

    <!--- Form Pemesanan --->
    <div id="pemesanan" class="container" style="height: 100%;">
        <h2>Form Pemesanan</h2>
    <form id="formPemesanan" action="proses.php" method="POST">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>

        <label for="no_hp">Nomor HP:</label>
        <input type="text" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Handphone" required>

        <label for="tanggal">Tanggal Pemesanan:</label>
        <input type="date" id="tanggal" name="tanggal" required onchange="updateHarga()">

        <label>Pilih Wahana:</label>
        <div id="paketContainer" name="paket[]">
            <label>
                <input type="checkbox" name="paket[]" class="paket" value="Rainbow Slide" data-weekday="15000" data-weekend="20000" onchange="updateHarga()">
                Rainbow Slide (Weekday : 15.000, Weekend : 20.000)
            </label>
            <label>
                <input type="checkbox" name="paket[]" class="paket" value="Flying Fox" data-harga="15000" onchange="updateHarga()">
                Flying Fox (Rp. 15.000)
            </label>
            <label>
                <input type="checkbox" name="paket[]" class="paket" value="Jeep Adventure" onchange="toggleSubPaketJeep()">
                Jeep Adventure (Rp. 400.000 - Rp. 600.000)
            </label>
        </div>

        <div id="subPaketJeepContainer" style="display: none; margin-left: 20px;">
            <label>
                <input type="checkbox" class="subPaketJeep" name="paket[]" value="Jeep Offroad Dan Sunrise Adventure" data-harga="400000" onchange="updateHarga()">
                Jeep Offroad Dan Sunrise Adventure (Rp 400.000/Mobil untuk 4 Orang)
            </label>
            <label>
                <input type="checkbox" class="subPaketJeep" name="paket[]" value="Paket Fun Offroad Dan Hiking" data-harga="600000" onchange="updateHarga()">
                Paket Fun Offroad Dan Hiking (Rp 600.000)
            </label>
        </div>

        <label for="jumlah">Jumlah Orang:</label>
        <input type="number" id="jumlah" name="jumlah" min="1" value="1" required onchange="updateHarga()">

        <label for="harga">Harga per Paket:</label>
        <input type="text" id="harga" name="harga" readonly>

        <label for="total_harga">Total Harga:</label>
        <input type="text" id="total_harga" name="total_harga" readonly>

        <button type="submit">Pesan Sekarang</button>
    </form>
    </div>

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

  <!--- Kontak --->
    <footer id="kontak" class="footer">
      <div class="footer-content">
        <div class="left-section">
          <img src="images/footer.png">
          <p class="description">
            Jangan Tunda, Saatnya Berkeliling Ke Tempat Wisata
          </p>
          <p class="description">
            Dan Menemukan Hal-Hal Baru Dan Menarik 
          </p>
          <p class="description">Lainnya</p>
        </div>
        <div class="right-section">
          <h3 class="update-title">Dapatkan Update Terbaru</h3>
          <form class="subscription-form">
            <input
              type="email"
              placeholder="Masukkan Alamat Email Anda"
              class="email-input"
              required
            />
            <button type="submit" class="submit-button">Daftar</button>
          </form>
        </div>
      </div>
      <div class="footer-bottom">
        <p>Dibuat Oleh <strong>Tri Maryani</strong>, Bersama Membangun Masa Depan &copy;2024</p>
      </div>
    </footer>
</body>
</html>