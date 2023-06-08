<?php
// Start session dan buat suatu variable untuk validasi login
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h2>Data Mahasiswa</h2>
    </header>
    <div class="container">
        <?php
        // Menampilkan user status dan login/logout button
        $statusText = ($isLoggedIn === true) ? 'Admin' : 'Guest';
        $loginButton = ($isLoggedIn === true) ? '<a href="c_logout.php" class="button">Log Out</a>' : '<a href="v_login.php" class="button">Log In</a>';
        echo "<h4>Halo, $statusText</h4>";
        echo "$loginButton<br><br>";
        ?>
        <div class="inner">
            <table>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Email</th>
                    <?php
                    // Menampilkan kolom edit apabila user adalah admin
                    if ($isLoggedIn === true) {
                        echo '<th>Edit</th>';
                    }
                    ?>
                </tr>
                <?php
                    // Menampilkan data dari mahasiswa deng5an menggunakan fungsi getSemuaMahasiswa()
                    require_once("m_admin.php");
                    $mahasiswaObj = new admin();
                    $semuaMahasiswa = $mahasiswaObj->getData();

                    $nomor = 1;
                    foreach ($semuaMahasiswa as $mhs) {
                        echo "<tr>";
                        echo "<td>" . $nomor . "</td>";
                        echo "<td>" . $mhs['NIM'] . "</td>";
                        echo "<td>" . $mhs['nama'] . "</td>";
                        echo "<td>" . $mhs['programStudi'] . "</td>";
                        echo "<td>" . $mhs['email'] . "</td>";
                        if ($isLoggedIn === true) {
                            echo '<td>';
                            echo '<a href="v_update.php?nim=' . $mhs['NIM'] . '" class="add">Ubah</a>';
                            echo ' | ';
                            echo '<a href="c_delete.php?nim=' . $mhs['NIM'] . '" onclick="return confirm(\'Apakah Anda yakin akan menghapus data mahasiswa ini?\')"  class="delete">Hapus</a>';
                            echo '</td>';
                        }
                        echo "</tr>";
                        $nomor++;
                    }
                ?>
            </table>
            <?php
                // Menampilkan button "Tambah Mahasiswa" user adalah admin
                if ($isLoggedIn === true) {
                    echo '<br><br>';
                    echo '<a href="v_add.php?" class="button">Tambah Mahasiswa</a>';
                }
            ?>
        </div>
    </div>
    </body>
</html>
