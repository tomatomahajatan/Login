<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm']);

    // Validasi dasar
    if (empty($fullname) || empty($email) || empty($password) || empty($confirm)) {
        echo "<p style='color:red;'>Semua field wajib diisi!</p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red;'>Format email tidak valid!</p>";
    } elseif ($password !== $confirm) {
        echo "<p style='color:red;'>Password dan konfirmasi tidak sama!</p>";
    } else {
        // Simulasi penyimpanan user (biasanya ke database)
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;

        // Jika Remember Me dicentang, simpan cookie
        if (isset($_POST['remember'])) {
            setcookie("remember_email", $email, time() + (86400 * 7), "/");
        }

        header("Location: dashboard.php");
        exit;
    }
}
?>
