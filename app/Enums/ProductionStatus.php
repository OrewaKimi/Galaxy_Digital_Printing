<?php

namespace App\Enums;

enum ProductionStatus: string
{
    case NOT_STARTED = 'not_started';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case ON_HOLD = 'on_hold';
    case CANCELLED = 'cancelled';
    case REJECTED = 'rejected';

    public function label(): string
    {
        return match($this) {
            self::NOT_STARTED => 'Belum Dimulai',
            self::IN_PROGRESS => 'Sedang Dikerjakan',
            self::COMPLETED => 'Selesai',
            self::ON_HOLD => 'Ditunda',
            self::CANCELLED => 'Dibatalkan',
            self::REJECTED => 'Ditolak',
        };
    }

    public function getColor(): string
    {
        return match($this) {
            self::NOT_STARTED => 'gray',
            self::IN_PROGRESS => 'info',
            self::COMPLETED => 'success',
            self::ON_HOLD => 'warning',
            self::CANCELLED => 'danger',
            self::REJECTED => 'danger',
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
