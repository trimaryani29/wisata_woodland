<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Email</title>
    <style>
        /* Reset margin dan padding untuk seluruh elemen */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Styling untuk body halaman */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }

        /* Judul Halaman */
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Tabel untuk daftar email */
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Styling untuk header tabel */
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        /* Styling untuk data pada tabel */
        td {
            color: #555;
        }

        /* Warna latar belakang baris tabel genap */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Efek hover pada baris tabel */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Styling untuk baris kosong ketika tidak ada data */
        td[colspan="3"] {
            text-align: center;
            color: #ff0000;
            font-style: italic;
        }

    </style>
</head>
<body>
    <h1>Daftar Email yang Terdaftar</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Tanggal Pendaftaran</th>
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

            // Periksa koneksi
            if (!$conn) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }

            // Query untuk mengambil data email
            $query = "SELECT id, email, created_at FROM subscribers ORDER BY created_at DESC";
            $result = mysqli_query($conn, $query);

            // Periksa apakah ada data
            if (mysqli_num_rows($result) > 0) {
                $no = 1; // Nomor urut
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['created_at']}</td>
                    </tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='3'>Tidak ada email yang terdaftar.</td></tr>";
            }

            // Tutup koneksi
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>
