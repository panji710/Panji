<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM items WHERE id = $id");
$item = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];

    $stmt = $conn->prepare("UPDATE items SET name = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $description, $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
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
            max-width: 500px;
            margin: 20px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #2E7D32;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        button {
            background-color: #2E7D32;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        button:hover {
            background-color: #1B5E20;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
        }

        .back a {
            color: #2E7D32;
            text-decoration: none;
            font-weight: bold;
        }

        .back a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Edit Item</h2>
    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="name" value="<?= $item['name']; ?>" required>
        <label>Deskripsi:</label>
        <textarea name="description" required><?= $item['description']; ?></textarea>
        <button type="submit">Simpan Perubahan</button>
    </form>
    <a href="dashboard.php">Kembali</a>
</body>
</html>
