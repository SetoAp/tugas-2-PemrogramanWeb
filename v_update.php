<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        $isLoggedIn = true;    // Mengatur variabel isLoggedIn menajdi true jika user adalah admin
    } else {
        $isLoggedIn = false;    // Mengatur variabel isLoggedIn menajdi false jika user tidak login
        header("location:v_login.php");    // Redirecting kembali ke v_table.php sebagai user
        exit();    // Exiting script
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
    <h2>Update Mahasiswa</h2>
    <?php
    // Mengambil nilai 'nim' dari URL menggunakan $_GET
    $nim = $_GET['nim'];
    ?>

    <!-- Menampilkan form untuk melakukan update  -->
    <form action="c_update.php" method="POST">

        <input type="hidden" name="nim" value="<?php echo $nim; ?>">
        
        <label>New NIM:</label>
        <input type="text" name="newNIM"><br>

        <label>Nama:</label>
        <input type="text" name="nama"><br>

        <label>Program Studi:</label>
        <input type="text" name="programStudi"><br>

        <label>Email:</label>
        <input type="email" name="email"><br>

        <input type="submit" name="updateMahasiswa" value="Update Mahasiswa"><br>
        
        <a href="index.php?nim=" class="cencel">Batal</a>
    </form>
</body>
</html>
