<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\StoryTag
 *
 * @property string $id
 * @property string $story_id
 * @property string $text タグ
 * @property int $order ソート順
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Story $story
 * @method static \Database\Factories\StoryTagFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|StoryTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StoryTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StoryTag query()
 * @mixin \Eloquent
 */
class StoryTag extends Model
{
    use HasFactory;
    use HasUuids;

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }
}
