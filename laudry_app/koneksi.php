<?php
$conn = mysqli_connect("localhost", "root", "", "db_laundry");

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
