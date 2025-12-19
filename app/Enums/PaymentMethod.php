<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case CASH = 'cash';
    case TRANSFER = 'transfer';
    case CREDIT_CARD = 'credit_card';
    case DEBIT_CARD = 'debit_card';
    case E_WALLET = 'e-wallet';
    case OTHER = 'other';

    public function label(): string
    {
        return match($this) {
            self::CASH => 'Tunai',
            self::TRANSFER => 'Transfer Bank',
            self::CREDIT_CARD => 'Kartu Kredit',
            self::DEBIT_CARD => 'Kartu Debit',
            self::E_WALLET => 'E-Wallet',
            self::OTHER => 'Lainnya',
        };
    }

    public function getColor(): string
    {
        return match($this) {
            self::CASH => 'success',
            self::TRANSFER => 'info',
            self::CREDIT_CARD => 'warning',
            self::DEBIT_CARD => 'warning',
            self::E_WALLET => 'primary',
            self::OTHER => 'gray',
        };
    }

    public static function options(): array
    {
        $options = [];
        foreach (self::cases() as $case) {
            $options[$case->value] = $case->label();
        }
        return $options;
    }
}
