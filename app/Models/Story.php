<?php

namespace App\Models;

use App\Enums\Genre;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Story
 *
 * @property string $id
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title タイトル
 * @property Genre $Genre ジャンル
 * @property string|null $catchphrase キャッチフレーズ
 * @property string|null $introduction 紹介文
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Episode> $episodes
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\StoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Story newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Story newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Story query()
 * @mixin \Eloquent
 */
class Story extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'Genre' => Genre::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
