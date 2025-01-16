<?php
include '../../config/koneksi.php';
session_start();

$id = $_POST['id'];
$status = $_POST['status'];
$id_dokter = $_SESSION['id'];

if ($status == 'Y') {
    // Mengubah status menjadi tidak aktif
    $queryUbahStatus = mysqli_query($mysqli, "UPDATE jadwal_periksa SET status = 'T' WHERE id = '$id'");

    if ($queryUbahStatus) {
        echo '<script>alert("Jadwal tidak aktif");window.location.href="../../jadwalPeriksa.php";</script>';
    } else {
        echo '<script>alert("Error saat mengubah status menjadi tidak aktif");window.location.href="../../jadwalPeriksa.php";</script>';
    }
} else if ($status == 'T') {
    // Mengecek apakah sudah ada jadwal aktif pada hari yang sama
    $queryCekHari = mysqli_query($mysqli, "
        SELECT COUNT(*) AS aktif 
        FROM jadwal_periksa 
        WHERE id_dokter = '$id_dokter' 
        AND status = 'Y' 
        AND hari = (SELECT hari FROM jadwal_periksa WHERE id = '$id')
    ");
    $dataHari = mysqli_fetch_assoc($queryCekHari);

    if ($dataHari['aktif'] > 0) {
        echo '<script>alert("Jadwal sehari hanya bisa memiliki 1 jadwal aktif");window.location.href="../../jadwalPeriksa.php";</script>';
    } else {
        // Mengaktifkan jadwal
        $queryUbahStatus = mysqli_query($mysqli, "UPDATE jadwal_periksa SET status = 'Y' WHERE id = '$id'");

        if ($queryUbahStatus) {
            echo '<script>alert("Jadwal berhasil diaktifkan");window.location.href="../../jadwalPeriksa.php";</script>';
        } else {
            echo '<script>alert("Error saat mengubah status menjadi aktif");window.location.href="../../jadwalPeriksa.php";</script>';
        }
    }
}

mysqli_close($mysqli);
?>
