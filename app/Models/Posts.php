<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'public',
        'content',
        'slug'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function categories() {
        return $this->hasMany('App\Models\PostsCategories', 'id', 'post_id');
    }
}
