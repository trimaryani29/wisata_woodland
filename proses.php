<?php

// Koneksi ke database
$host = 'localhost';
$db = 'wisata';
$user = 'root';
$pass = '';

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi database
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi untuk menambahkan data pesanan
function tambahPesanan($nama, $no_hp, $tanggal, $paket, $jumlah, $harga, $total_harga) {
    global $conn;

    // Query SQL untuk menambahkan data
    $query = "INSERT INTO pesanan (nama, no_hp, tanggal, paket, jumlah, harga, total_harga) 
              VALUES ('$nama', '$no_hp', '$tanggal', '$paket', '$jumlah', '$harga', '$total_harga')";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        // Debug jika terjadi error
        echo "Query Error: " . mysqli_error($conn);
        return false;
    }
}

// Cek apakah data dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = trim($_POST['nama']);
    $no_hp = trim($_POST['no_hp']);
    $tanggal = trim($_POST['tanggal']);
    $paket = isset($_POST['paket']) && is_array($_POST['paket']) ? implode(', ', $_POST['paket']) : ''; // Gabungkan array menjadi string
    $jumlah = (int) trim($_POST['jumlah']);
    $harga = (int) str_replace(['Rp ', '.'], '', $_POST['harga']); // Bersihkan format Rp dan titik
    $total_harga = (int) str_replace(['Rp ', '.'], '', $_POST['total_harga']); // Bersihkan format Rp dan titik
    
    // Validasi data
    if (!empty($nama) && !empty($no_hp) && !empty($tanggal) && !empty($paket) && $jumlah > 0 && $harga > 0 && $total_harga > 0) {
        // Tambahkan data ke database
        if (tambahPesanan($nama, $no_hp, $tanggal, $paket, $jumlah, $harga, $total_harga)) {
            echo "Pesanan berhasil disimpan.";
            // Redirect ke halaman sukses atau lainnya
            $id_pemesanan = mysqli_insert_id($conn);
            header('Location: invoice.php?id='.$id_pemesanan);
            exit();
        } else {
            echo "Gagal menyimpan pesanan.";
        } 
    } else {
        echo "Data tidak lengkap atau tidak valid. Mohon isi semua field.";
    }
} else {
    echo "Akses tidak valid.";
}

?>
