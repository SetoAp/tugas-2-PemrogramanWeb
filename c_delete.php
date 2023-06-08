<?php
session_start();
require_once 'm_admin.php';

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $isLoggedIn = true;    // Mengatur variabel isLoggedIn menajdi true jika user adalah admin
} else {
    $isLoggedIn = false;    // Mengatur variabel isLoggedIn menajdi false jika user tidak login
    header("location:v_login.php");    // Redirecting kembali ke v_table.php sebagai user
    exit();    // Exiting script
}

// memastikan terdapat parameter NIM yang diterima
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    // Buat objek admin
    $admin = new admin();

    // Panggil fungsi hapusMahasiswa() untuk menghapus data mahasiswa
    $admin->hapusMahasiswa($nim);

    // Redirect kembali ke halaman sebelumnya atau halaman lain yang diinginkan
    header("Location: v_table.php");
    exit;
} else {
    // Tampilkan error ketika nim tidak ada
    echo "Parameter NIM tidak ditemukan.";
}
?>
