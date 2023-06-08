<?php
    session_start();    // Memulai session
    require_once 'm_admin.php';    // Menyertakan file m_admin.php

    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        $isLoggedIn = true;    // Mengatur variabel isLoggedIn menajdi true jika user adalah admin
    } else {
        $isLoggedIn = false;    // Mengatur variabel isLoggedIn menajdi false jika user tidak login
        header("location:v_login.php");    // Redirecting kembali ke v_table.php sebagai user
        exit();    // Exiting script
    }

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateMahasiswa'])) {
        $NIM = $_POST['nim'];    // Mendapatkan nilai variabel NIM dari url parameter
        $newNIM = $_POST['newNIM'];    // Mendapatkan nilai variabel newNIM(NIM baru) dari form
        $nama = $_POST['nama'];    // Mendapatkan nilai variabel nama dari form
        $programStudi = $_POST['programStudi'];    // Mendapatkan nilai variabel programStudi dari form
        $email = $_POST['email'];    // Mendapatkan nilai variabel email dari form

        // Membuat instance dari kelas admin
        $admin = new admin();

        // Jika form update kosong semua  maka redirect kembali ke v_table.php
        if ($newNIM == "" && $nama == "" && $programStudi == "" && $email == "") {
            header("location:v_table.php");   
            exit();
        }
        // Memanggil fungsi updateMahasiswa dari kelas admin untuk melakukan update
        $admin->updateMahasiswa($NIM, $newNIM, $nama, $programStudi, $email);
    }
?>