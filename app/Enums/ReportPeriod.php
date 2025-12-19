<?php

namespace App\Enums;

enum ReportPeriod: string
{
    case DAILY = 'daily';
    case WEEKLY = 'weekly';
    case MONTHLY = 'monthly';
    case QUARTERLY = 'quarterly';
    case YEARLY = 'yearly';
    case CUSTOM = 'custom';

    public function label(): string
    {
        return match($this) {
            self::DAILY => 'Harian',
            self::WEEKLY => 'Mingguan',
            self::MONTHLY => 'Bulanan',
            self::QUARTERLY => 'Triwulan',
            self::YEARLY => 'Tahunan',
            self::CUSTOM => 'Kustom',
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
