<?php

namespace App\Enums;

enum UserRole: string
{
    case CUSTOMER = 'customer';
    case CUSTOMER_SERVICE = 'customer_service';
    case PRODUCTION = 'production';
    case DESIGNER = 'designer';
    case ADMIN = 'admin';

    public function label(): string
    {
        return match($this) {
            self::CUSTOMER => 'Pelanggan',
            self::CUSTOMER_SERVICE => 'Customer Service',
            self::PRODUCTION => 'Produksi',
            self::DESIGNER => 'Desainer',
            self::ADMIN => 'Admin',
        };
    }

    public function getColor(): string
    {
        return match($this) {
            self::ADMIN => 'danger',
            self::DESIGNER => 'warning',
            self::PRODUCTION => 'info',
            self::CUSTOMER_SERVICE => 'success',
            self::CUSTOMER => 'gray',
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
