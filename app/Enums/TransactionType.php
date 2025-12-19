<?php

namespace App\Enums;

enum TransactionType: string
{
    case IN = 'in';
    case OUT = 'out';
    case ADJUSTMENT = 'adjustment';
    case RETURN = 'return';
    case WASTE = 'waste';

    public function label(): string
    {
        return match($this) {
            self::IN => 'Masuk',
            self::OUT => 'Keluar',
            self::ADJUSTMENT => 'Penyesuaian',
            self::RETURN => 'Retur',
            self::WASTE => 'Limbah',
        };
    }

    public function getColor(): string
    {
        return match($this) {
            self::IN => 'success',
            self::OUT => 'warning',
            self::ADJUSTMENT => 'info',
            self::RETURN => 'danger',
            self::WASTE => 'gray',
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
