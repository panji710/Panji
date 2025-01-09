<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Berhasil</title>
    <link rel="stylesheet" href="out.css">
</head>
<body>
    <div class="container">
        <div class="success-icon"></div>
        <h1>Login Berhasil! <?php echo $_SESSION['username']; ?></h1>
        <p>Selamat datang kembali! Anda telah berhasil masuk ke akun Anda.</p>
        <a href="ukl2.html" class="btn">Lanjut ke Dashboard</a>
    </div>
</body>
</html>