<?php
include 'koneksi.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php"); 
    exit;
}

$user_id = $_SESSION["user_id"];
$result = $conn->query("SELECT * FROM items WHERE user_id = $user_id");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard</title>
    <style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background: #F4F4F4;
        padding: 20px;
    }

    .navbar {
        background: #2E7D32;
        color: white;
        padding: 15px;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #2E7D32;
        margin-bottom: 15px;
        text-align: center;
    }

    .btn {
        display: inline-block;
        background: #2E7D32;
        color: white;
        padding: 10px 15px;
        border-radius: 5px;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn:hover {
        background: #1B5E20;
    }

    .logout {
        display: block;
        text-align: center;
        margin-top: 20px;
    }


    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: center; 
    }

    th {
        background: #2E7D32;
        color: white;
    }

    td {
        background: #f9f9f9;
    }

    tr:nth-child(even) td {
        background: #e8f5e9;
    }


    .action-btn {
        display: inline-block;
        padding: 5px 10px;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        font-size: 14px;
        margin: 2px;
    }

    .edit-btn {
        background: #ff9800;
    }

    .edit-btn:hover {
        background: #e68900;
    }

    .delete-btn {
        background: #d32f2f;
    }

    .delete-btn:hover {
        background: #b71c1c;
    }
</style>

</head>
<body>
    <h2>Selamat Datang, <?= $_SESSION["username"]; ?></h2>
    <a href="add.php" class="btn">Tambah Item</a>
    <a href="logout.php" class="btn" style="background-color: red;">Logout</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['description']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
