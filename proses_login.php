<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);
    
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
        } else {
            echo "<script>alert('Password salah!'); window.location='login.html';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.location='login.html';</script>";
    }
}
?>