<?php

declare(strict_types=1);

require_once __DIR__ . '/Transaction.php';

session_start();

$errors = [];
$message = '';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if (!isset($_SESSION['transactions'])) {
    $_SESSION['transactions'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $postToken = $_POST['csrf_token'] ?? '';

    if (!hash_equals($_SESSION['csrf_token'], $postToken)) {
        $errors[] = 'Kesalahan keamanan: token CSRF tidak valid.';
    }

    if (isset($_POST['reset_data']) && empty($errors)) {

        $_SESSION['balance'] = 0.0;
        $_SESSION['transactions'] = [];

        $message = 'Saldo dan riwayat transaksi berhasil direset.';

        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

    } elseif (empty($errors)) {

        $type = $_POST['type'] ?? '';
        $amountInput = trim($_POST['amount'] ?? '');

        if ($type !== 'deposit' && $type !== 'withdraw') {
            $errors[] = 'Jenis transaksi tidak valid.';
        }

        if ($amountInput === '' || !is_numeric($amountInput)) {
            $errors[] = 'Jumlah transaksi harus berupa angka.';
        } elseif ((float) $amountInput <= 0) {
            $errors[] = 'Jumlah transaksi harus lebih dari 0.';
        }

        if (empty($errors)) {

            $amount = (float) $amountInput * 1000;

            $transaction = new Transaction(
                uniqid('TRX-', true),
                $type,
                $amount
            );

            $message = $transaction->process();

            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
    }
}

$balance = $_SESSION['balance'] ?? 0.0;
$transactions = $_SESSION['transactions'];
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

        <input
            type="hidden"
            name="csrf_token"
            value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>"
        >

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

    <form method="post" action="">
        <input
            type="hidden"
            name="csrf_token"
            value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>"
        >

        <button type="submit" name="reset_data" value="1">
            Reset Data
        </button>
    </form>
    
    <hr>

    <h2>Riwayat Transaksi</h2>

    <?php if (empty($transactions)): ?>

        <p>Belum ada transaksi.</p>

    <?php else: ?>

        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>Saldo Setelah Transaksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                    <tr>
                        <td>
                            <?= htmlspecialchars(
                                $transaction['id'],
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(
                                $transaction['type'],
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>
                        </td>

                        <td>
                            Rp <?= number_format(
                                (float) $transaction['amount'],
                                2,
                                ',',
                                '.'
                            ) ?>
                        </td>

                        <td>
                            Rp <?= number_format(
                                (float) $transaction['balance'],
                                2,
                                ',',
                                '.'
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>

</body>
</html>