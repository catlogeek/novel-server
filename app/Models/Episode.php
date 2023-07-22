<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Episode
 *
 * @property string $id
 * @property string $story_id
 * @property string $title タイトル
 * @property string $body 本文
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read \App\Models\Story $story
 * @method static \Database\Factories\EpisodeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Episode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode query()
 * @mixin \Eloquent
 */
class Episode extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [
        'id',
    ];

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
