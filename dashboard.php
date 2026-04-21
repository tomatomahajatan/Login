<?php
session_start();

if (!isset($_SESSION['fullname'])) {
    header("Location: index.html");
    exit;
}

echo "<h2>Selamat datang, " . $_SESSION['fullname'] . "!</h2>";
echo "<p>Email terdaftar: " . $_SESSION['email'] . "</p>";

if (isset($_COOKIE['remember_email'])) {
    echo "<p>Cookie Remember Me aktif untuk email: " . $_COOKIE['remember_email'] . "</p>";
}
?>
