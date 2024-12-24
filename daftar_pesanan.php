<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link ke file CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
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
                <li><a href="index.php" class="active">Beranda</a></li>
                <li><a href="#daftar_pesanan">Daftar Pesanan</a></li>
                <li><a href="#kontak">Kontak</a></li>
            </ul>
        </nav>
    </header>
    <h1 id="daftar_pesanan" class="text-center">Daftar Pesanan</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>No. HP</th>
                <th>Tanggal</th>
                <th>Paket</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total Harga</th>
                <th>Created_at</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Koneksi ke database
            $host = 'localhost';
            $db = 'wisata';
            $user = 'root';
            $pass = '';
            $conn = mysqli_connect($host, $user, $pass, $db);

            $query = "SELECT * FROM pesanan where is_deleted=0 ORDER BY tanggal DESC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['nama']}</td>
                        <td>{$row['no_hp']}</td>
                        <td>{$row['tanggal']}</td>
                        <td>{$row['paket']}</td>
                        <td>{$row['jumlah']}</td>
                        <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                        <td>Rp " . number_format($row['total_harga'], 0, ',', '.') . "</td>
                        <td>" . date('d-m-Y H:i:s', strtotime($row['created_at'])) . "</td>
                        <td>
                        <a href='invoice.php?id={$row['id']}'>Invoice</a>
                        <a href='hapus.php?id={$row['id']}'>Hapus</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada pesanan.</td></tr>";
            }
            ?>
        </tbody>
        <a href=""></a>
    </table>

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
          <form action="proses_email.php" method="POST" class="subscription-form">
            <input
              type="email"
              name="email"
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
