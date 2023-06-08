<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        $isLoggedIn = true;    // Mengatur variabel isLoggedIn menajdi true jika user adalah admin
    } else {
        $isLoggedIn = false;    // Mengatur variabel isLoggedIn menajdi false jika user tidak login
        header("v_login.php");    // Redirecting kembali ke v_table.php sebagai user
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
    <h2>Tambah Mahasiswa</h2>
    <form action="c_add.php" method="POST">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br>
        
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br>
        
        <label for="programStudi">Program Studi:</label>
        <input type="text" id="programStudi" name="programStudi" required><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        
        <input type="submit" value="Tambah Mahasiswa"><br>

        <a href="index.php?nim=" class="cencel">Batal</a>
    </form>
</body>
</html>
