<?php
session_start();

// Periksa apakah pengguna sudah login
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    // Ambil peran pengguna
    $role = $_SESSION['akses'];

    // Redirect ke halaman dashboard sesuai peran
    if ($role === 'dokter') {
        header("Location: dashboard.php");
    } elseif ($role === 'pasien') {
        header("Location: dashboard.php");
    } elseif ($role === 'admin') {
        header("Location: dashboard.php");
    }
    exit();
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poliklinik</title>

    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <!-- Header -->
    <div class="container-fluid py-5 text-white" style="background-color: #387478;">
        <div class="text-center">
            <h1 class="fw-bold">Sistem Janji Temu</h1>
            <p class="mt-3 fs-5">Menghubungkan pasien dan dokter dengan mudah dan cepat.</p>
        </div>
    </div>

    <!-- Content -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <!-- Login Sebagai Pasien -->
            <div class="col-md-5 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-user-circle fa-4x text-primary"></i>
                        </div>
                        <h4 class="fw-bold text-dark">Login Sebagai Pasien</h4>
                        <p class="text-muted">Jika Anda adalah pasien, silahkan login untuk melakukan pendaftaran dan mengakses layanan kami.</p>
                        <a href="loginUser.php" class="btn btn-primary w-100">Login Pasien</a>
                    </div>
                </div>
            </div>

            <!-- Login Sebagai Dokter -->
            <div class="col-md-5 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-user-md fa-4x text-success"></i>
                        </div>
                        <h4 class="fw-bold text-dark">Login Sebagai Dokter</h4>
                        <p class="text-muted">Jika Anda adalah dokter, silahkan login untuk memulai memberikan pelayanan kepada pasien.</p>
                        <a href="login.php" class="btn btn-success w-100">Login Dokter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
