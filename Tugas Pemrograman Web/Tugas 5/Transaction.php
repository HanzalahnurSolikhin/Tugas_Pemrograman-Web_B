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

        $message = match ($this->type) {
            'deposit' => $this->processDeposit($currentBalance),
            'withdraw' => $this->processWithdraw($currentBalance),
            default => 'Jenis transaksi tidak valid.',
        };

        if (
            $message === 'Deposit berhasil diproses.'
            || $message === 'Penarikan berhasil diproses.'
        ) {
            $_SESSION['transactions'][] = [
                'id' => $this->id,
                'type' => $this->type,
                'amount' => $this->amount,
                'balance' => $_SESSION['balance'],
            ];
        }

        return $message;
    }

    private function processDeposit(float $currentBalance): string
    {
        $_SESSION['balance'] = $currentBalance + $this->amount;

        return 'Deposit berhasil diproses.';
    }

    private function processWithdraw(float $currentBalance): string
    {
        if ($this->amount > $currentBalance) {
            return 'Penarikan ditolak karena saldo tidak mencukupi.';
        }

        $_SESSION['balance'] = $currentBalance - $this->amount;

        return 'Penarikan berhasil diproses.';
    }
}