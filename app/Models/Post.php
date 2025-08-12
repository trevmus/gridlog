<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Post extends Model
{
            /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'post_status',
        'category_id',
        'user_id',
        'name',
        'usertype',
        'image'
    ];
        /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        // 'post_status' => 'boolean', // Assuming it's a boolean field
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    /**
     * Get the category that owns the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
            return $this->belongsTo(Category::class);
    }
        /**
     * Get the user that owns the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include active posts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('post_status', true);
    }

    /**
     * Scope a query to only include posts from a specific category.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $categoryId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFromCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }
}
