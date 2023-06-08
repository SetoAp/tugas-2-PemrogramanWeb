<?php
    session_start();
    
    require_once 'm_admin.php';

    // Memeriksa apakah sudah login, jika belum maka akan kembali ke tampilan guest
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        $isLoggedIn = true;
    } else {
        $isLoggedIn = false;
        header("location:v_login.php");
        exit;
    }

    // Memeriksa apakah data terkirim melalui metode POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Membaca data yang dikirimkan dari form
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $programStudi = $_POST['programStudi'];
        $email = $_POST['email'];
    
        // Membuat objek admin
        $admin = new admin();
    
        // Memanggil fungsi tambahMahasiswa
        $admin->tambahMahasiswa($nim, $nama, $programStudi, $email);
    }
?>