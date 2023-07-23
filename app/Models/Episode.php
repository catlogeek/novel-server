<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Episode
 *
 * @property string $id
 * @property string $story_id
 * @property string $title タイトル
 * @property string $body 本文
 * @property Status $Status ステータス
 * @property int $order ソート順
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comment
 * @property-read \App\Models\Story $story
 * @method static \Database\Factories\EpisodeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Episode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode query()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode withoutTrashed()
 * @mixin \Eloquent
 */
class Episode extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'Status' => Status::class,
    ];

    protected $with = [
        'story',
        'story.user',
    ];

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }

    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
