<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['content', 'user_id', 'image', 'original_post_id' ];

    /**
     * Get the posts associated with this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(PostLike::class);
    }

    public function isLikedBy(User $user): Bool
    {
        return $this->likes->where('user_id', $user->id)->count() > 0;
    }

    /**
     * Get the posts associated with this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the posts associated with this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function originalPost(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'original_post_id');
    }

    /**
     * Get the count of comment
     */
    public function commentCount(): int
    {
        return $this->comments()->count();
    }

    public function shareCount(): int
    {
        return $this->where('original_post_id', $this->id)->count();
    }

    public function getUserPostAttribute(): Bool
    {
        return Auth::check() && optional($this->user)->id === Auth::id();
    }
}
