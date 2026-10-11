<?php

declare(strict_types=1);

require_once __DIR__ . '/GuestBook2.php';

$dsn = 'mysql:host=localhost;dbname=akademik_db;charset=utf8mb4';
$username = 'root';
$password = '';

try {
    $pdo = new PDO(
        $dsn,
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );

    $guestBook = new GuestBook($pdo);
} catch (PDOException $e) {
    exit('Koneksi database gagal: ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pesan = trim($_POST['pesan'] ?? '');

    $guestBook->addMessage(
        $nama,
        $email,
        $pesan
    );

    header('Location: guestbook.php');
    exit;
}

$messages = $guestBook->getMessages();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Buku Tamu Perpustakaan</title>

    <style>
        body {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
            font-family: Arial, sans-serif;
            line-height: 1.5;
        }

        form {
            display: grid;
            gap: 12px;
            margin-bottom: 32px;
        }

        input,
        textarea,
        button {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            font: inherit;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        button {
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            vertical-align: top;
        }

        th {
            background: #f2f2f2;
        }
    </style>
</head>

<body>

    <h1>Buku Tamu Perpustakaan</h1>

    <form method="POST" action="">
        <div>
            <label for="nama">Nama</label>

            <input
                type="text"
                id="nama"
                name="nama"
            >
        </div>

        <div>
            <label for="email">Email</label>

            <input
                type="email"
                id="email"
                name="email"
            >
        </div>

        <div>
            <label for="pesan">Pesan</label>

            <textarea
                id="pesan"
                name="pesan"
            ></textarea>
        </div>

        <button type="submit">
            Kirim Pesan
        </button>
    </form>

    <h2>Daftar Pesan</h2>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal Kirim</th>
            </tr>
        </thead>

        <tbody>
            <?php if ($messages === []): ?>
                <tr>
                    <td colspan="4">
                        Belum ada pesan.
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($messages as $message): ?>
                    <tr>
                        <td><?= $message['nama'] ?></td>
                        <td><?= $message['email'] ?></td>
                        <td><?= $message['pesan'] ?></td>
                        <td><?= $message['tanggal_kirim'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>