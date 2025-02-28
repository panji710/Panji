<?php
include 'koneksi.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$user_id = $_SESSION["user_id"];

$stmt = $conn->prepare("DELETE FROM items WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $id, $user_id);
$stmt->execute();

header("Location: dashboard.php");
exit;
?>
