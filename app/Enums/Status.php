<?php

namespace App\Enums;

use App\Enums\Traits\CollectionTrait;

enum Status: int
{
    use CollectionTrait;

    case Disable = 0;
    case Enable = 1;
    case Ban = 99;

    public function display(): string
    {
        return match ($this) {
            self::Disable => '無効/非公開',
            self::Enable => '有効/公開',
            self::Ban => 'BAN',
        };
    }
}
