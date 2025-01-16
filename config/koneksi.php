<?php 
$databaseHost = 'localhost';
$databaseName = 'wd08_sabilarizkikarim_a11.2021.13365';
$databaseUsername = 'root';
$databasePassword = '';
 
$mysqli = mysqli_connect($databaseHost, 
    $databaseUsername, $databasePassword, $databaseName);

// Periksa koneksi
if (!$mysqli) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
