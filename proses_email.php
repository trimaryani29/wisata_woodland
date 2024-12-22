<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wisata";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Pesan untuk ditampilkan
$message = "";

// Tangkap email dari form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];

    // Validasi email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $message = "Berhasil mendaftar!";
            header("Location: daftar_email.php");
            exit();
        } else {
            $message = "Gagal menyimpan email.";
        }

        $stmt->close();
    } else {
        $message = "Format email tidak valid.";
    }
}

// Ambil semua email dari tabel subscribers
$result = $conn->query("SELECT email FROM subscribers");

$conn->close();
?>
