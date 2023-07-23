<?php

namespace App\Enums;

enum Status: int
{
    case Disable = 0;
    case Enable = 1;
    case Ban = 99;

    public function display(): string
    {
        return match ($this) {
            self::Disable => '無効',
            self::Enable => '有効',
            self::Ban => '管理者による無効',
        };
    }
}
