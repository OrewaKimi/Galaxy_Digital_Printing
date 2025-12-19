<?php

namespace App\Enums;

enum CustomerType: string
{
    case PERSONAL = 'personal';
    case BUSINESS = 'business';

    public function label(): string
    {
        return match($this) {
            self::PERSONAL => 'Personal',
            self::BUSINESS => 'Bisnis',
        };
    }

    public function getColor(): string
    {
        return match($this) {
            self::PERSONAL => 'info',
            self::BUSINESS => 'success',
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
