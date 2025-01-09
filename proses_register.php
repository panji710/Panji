<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password . "<br>";
    echo "Confirm Password: " . $confirm_password . "<br>";
    
    $check_query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($koneksi, $check_query);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username sudah digunakan!'); window.location='register.html';</script>";
    } else if ($password !== $confirm_password) {
        echo "<script>alert('Password tidak cocok!'); window.location='register.html';</script>";
    } else {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        

        $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
        

        echo "Query: " . $query . "<br>";
        
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.html';</script>";
        } else {
            echo "Error MySQL: " . mysqli_error($koneksi) . "<br>";
            echo "<script>alert('Error: " . mysqli_error($koneksi) . "'); window.location='register.html';</script>";
        }
    }
}
?>