<?php

declare(strict_types=1);

class Transaction
{
    public function __construct(
        private string $id,
        private string $type,
        private float $amount
    ) {
    }

    public function process(): string
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $currentBalance = $_SESSION['balance'] ?? 0.0;

        return match ($this->type) {
            'deposit' => $this->processDeposit($currentBalance),
            'withdraw' => $this->processWithdraw($currentBalance),
            default => 'Jenis transaksi tidak valid.',
        };
    }

    private function processDeposit(float $currentBalance): string
    {
        $_SESSION['balance'] = $currentBalance + $this->amount;

        return 'Setoran berhasil. Saldo saat ini: ' . $_SESSION['balance'];
    }
    private function processWithdraw(float $currentBalance): string
    {
        if ($this->amount > $currentBalance) {
            return 'Saldo tidak mencukupi untuk melakukan penarikan.';
        }

        $_SESSION['balance'] = $currentBalance - $this->amount;
        return 'Penarikan berhasil. Saldo saat ini: ' . $_SESSION['balance'];
    }
}