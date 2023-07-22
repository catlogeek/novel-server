<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Note
 *
 * @property string $id
 * @property string $user_id
 * @property string $title タイトル
 * @property string $body 本文
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\NoteFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Note newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Note newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Note query()
 * @mixin \Eloquent
 */
class Note extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [
        'id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
