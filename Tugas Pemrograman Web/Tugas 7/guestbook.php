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