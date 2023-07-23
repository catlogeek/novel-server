<?php

namespace App\Enums\Traits;

use Illuminate\Support\Collection;

trait CollectionTrait
{
    /**
     * @return Collection<array-key, mixed>
     */
    public static function toCollection()
    {
        return (new Collection(self::cases()))
            ->map(fn ($row) => ['key' => $row->value, 'value' => $row->display()])
            ->pluck('value', 'key');
    }
}
