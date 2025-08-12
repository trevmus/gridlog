<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table= 'categories';
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        // Add other fillable fields here if needed
    ];
     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        // Add other casts if needed
    ];   
    /**
     * Get all posts that belong to this category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    // In Category model
    public static function create_category($data)
    {
        return self::create($data);
    }
}
