<?php
$host = 'localhost';
$db = 'wisata';
$user = 'root';
$pass = '';

$conn = mysqli_connect($host, $user, $pass, $db);

$id_pemesanan = htmlentities($_GET['id']);

$sql = "SELECT * FROM pesanan where id = '$id_pemesanan' and is_deleted=0";

$query = mysqli_query($conn,$sql);

if(mysqli_num_rows($query)==0)
{
    echo 'tidak ada'; exit;
}else{
    $sql_hapus = "UPDATE pesanan SET is_deleted='1' where id ='$id_pemesanan'";
    $query_hapus = mysqli_query($conn,$sql_hapus);
    //var_dump($sql_hapus); exit;
    if($query_hapus)
    {
        header('Location: daftar_pesanan.php');
    }else{
        header('Location: daftar_pesanan.php');
    }
}