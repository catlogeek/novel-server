<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property string $id ID
 * @property string $name ユーザ名
 * @property string $email メールアドレス
 * @property string $password パスワード
 * @property Status $Status ステータス
 * @property \Illuminate\Support\Carbon|null $email_verified_at メールアドレス認証
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Note> $notes
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Story> $stories
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    // use HasApiTokens;
    use HasFactory;
    // use Notifiable;
    use HasUuids;
    use SoftDeletes;

    protected $guarded = [
        'id',
    ];

    protected $attributes = [
        'Status' => Status::Enable,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'Status' => Status::class,
    ];

    public function stories(): HasMany
    {
        return $this->hasMany(Story::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }
}
