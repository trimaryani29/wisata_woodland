<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link rel="stylesheet" href="style.css"> <!-- Link ke file CSS -->
</head>
<body>
    <h1>Daftar Pesanan</h1>
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

            $query = "SELECT * FROM pesanan ORDER BY tanggal DESC";
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
                        <td>
                        <a href='invoice.php?id={$row['id']}'>Invoice</a>
                        <a href=''>Hapus</a>
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
</body>
</html>
