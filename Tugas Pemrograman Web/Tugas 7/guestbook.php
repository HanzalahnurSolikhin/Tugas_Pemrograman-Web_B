<?php

declare(strict_types=1);

session_start();

require_once __DIR__ . '/GuestBook.php';

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
    exit('Koneksi database gagal.');
}

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$errors = [];

$nama = '';
$email = '';
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrfToken = $_POST['csrf_token'] ?? '';

    if (
        !is_string($csrfToken)
        || !hash_equals($_SESSION['csrf_token'], $csrfToken)
    ) {
        $errors[] = 'Token CSRF tidak valid.';
    }

    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pesan = trim($_POST['pesan'] ?? '');

    if ($nama === '') {
        $errors[] = 'Nama tidak boleh kosong.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Format email tidak valid.';
    }

    if (strlen($pesan) < 5) {
        $errors[] = 'Pesan minimal lima karakter.';
    }

    if ($errors === []) {
        $guestBook->addMessage(
            $nama,
            $email,
            $pesan
        );

        $_SESSION['success'] = 'Pesan berhasil dikirim.';
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        header('Location: guestbook.php');
        exit;
    }
}

$success = $_SESSION['success'] ?? null;
unset($_SESSION['success']);

$messages = $guestBook->getMessages();

function e(string $value): string
{
    return htmlspecialchars(
        $value,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}
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

        .message {
            padding: 12px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
        }

        .message--error {
            background: #fff1f1;
        }

        .message--success {
            background: #f0fff4;
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

    <p>
        Silakan tuliskan pesan melalui formulir berikut.
    </p>

    <?php if ($success !== null): ?>
        <div class="message message--success">
            <?= e($success) ?>
        </div>
    <?php endif; ?>

    <?php if ($errors !== []): ?>
        <div class="message message--error">
            <strong>Terjadi kesalahan:</strong>

            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= e($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <input
            type="hidden"
            name="csrf_token"
            value="<?= e($_SESSION['csrf_token']) ?>"
        >

        <div>
            <label for="nama">Nama</label>

            <input
                type="text"
                id="nama"
                name="nama"
                value="<?= e($nama) ?>"
                required
            >
        </div>

        <div>
            <label for="email">Email</label>

            <input
                type="email"
                id="email"
                name="email"
                value="<?= e($email) ?>"
                required
            >
        </div>

        <div>
            <label for="pesan">Pesan</label>

            <textarea
                id="pesan"
                name="pesan"
                minlength="5"
                required
            ><?= e($pesan) ?></textarea>
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
                        <td><?= e($message['nama']) ?></td>
                        <td><?= e($message['email']) ?></td>
                        <td><?= nl2br(e($message['pesan'])) ?></td>
                        <td><?= e($message['tanggal_kirim']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>