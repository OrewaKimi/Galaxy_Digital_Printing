<?php

namespace App\Enums;

enum FileCategory: string
{
    case CUSTOMER_UPLOAD = 'customer_upload';
    case DESIGNER_DRAFT = 'designer_draft';
    case FINAL_DESIGN = 'final_design';
    case REVISION = 'revision';
    case REFERENCE = 'reference';

    public function label(): string
    {
        return match($this) {
            self::CUSTOMER_UPLOAD => 'Upload Pelanggan',
            self::DESIGNER_DRAFT => 'Draft Desainer',
            self::FINAL_DESIGN => 'Desain Final',
            self::REVISION => 'Revisi',
            self::REFERENCE => 'Referensi',
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
