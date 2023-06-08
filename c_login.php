<?php
    require_once "m_user.php";

    // Membuat objek User
    $user = new User("", "", "");

    // Menjalankan fungsi login
    $user->login();

    // Menampilkan pesan error jika ada
    if (isset($error)) {
        echo "<p>$error</p>";
    }
?>
