<?php

declare(strict_types= 1);

require_once __DIR__ . '/Transaction.php';

session_start();
$errors = [];
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'] ?? '';
    $amountInput = trim($_POST['amount'] ?? '');

    if ($type !== 'deposit' && $type !== 'withdraw') {
        $errors[] = 'Jenis transaksi tidak valid.';
    }

    if ($amountInput === '' || !is_numeric($amountInput)) {
        $errors[] = 'Jumlah transaksi harus berupa angka.';
    } elseif ((float)$amountInput <= 0) {
        $errors[] = 'Jumlah transaksi harus lebih besar dari nol.';
    }

    if (empty($errors)) {
        $amount = (float) $amountInput;

        $transaction = new Transaction(
            uniqid('TRX-', true),
            $type,
            $amount
        );
        $message = $transaction->process();
    }
}

$balance = $_SESSION['balance'] ?? 0.0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Manajemen Keuangan</title>
</head>

<body>

    <h1>Sistem Manajemen Keuangan</h1>

    <p>
        Saldo saat ini:
        <strong>
            Rp <?= number_format($balance, 2, ',', '.') ?>
        </strong>
    </p>

    <?php if ($message !== ''): ?>
        <p>
            <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
        </p>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li>
                    <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post" action="">

        <div>
            <label for="type">Jenis Transaksi</label>

            <select name="type" id="type" required>
                <option value="">-- Pilih Transaksi --</option>
                <option value="deposit">Deposit</option>
                <option value="withdraw">Penarikan</option>
            </select>
        </div>

        <br>

        <div>
            <label for="amount">Jumlah</label>

            <input
                type="number"
                name="amount"
                id="amount"
                min="0.01"
                step="0.01"
                placeholder="Masukkan jumlah"
                required
            >
        </div>

        <br>

        <button type="submit">
            Proses Transaksi
        </button>

    </form>

</body>
</html>