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
        'slug',
        'excert'
    ];

    protected $mainColumns = [
        'id',
        'author_id',
        'title',
        'public',
        'content',
        'slug',
        'view_count',
        'created_at',
        'updated_at',
        'excert',
        'thumbnail'
    ];
    const PUBLIC_POST = 1;

    /**
     * Scope a query to only include public posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublic($query)
    {
        return $query->where('public', self::PUBLIC_POST);
    }

    public function scopeExclude($query, ...$columns)
    {
        $value = [];
        foreach ($columns as $column) {
            $value[] = $column;
        }
        return $query->select( array_diff( $this->mainColumns,(array) $value) );
    }

    public function user() {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function categories() {
        return $this->hasMany('App\Models\PostsCategories', 'post_id', 'id');
    }

    /**
     * Get first category
     */
    public function firstCategory () {
        $category = null;
        if ($this->categories->count() !== 0 ) {
            $category = $this->categories->first()->category;
        }
        return $category;
    }

    /**
     * Get first category name
     */
    public function firstCategoryName () {
        $category = $this->firstCategory();
        if ($category) return $category->name;
        return Categories::DEFAULT_CATEGORY;
    }

    /**
     * Build url
     */
    public function url() {
        $category_identity = Categories::DEFAULT_CATEGORY;
        $category = $this->firstCategory();
        if ($category) {
            $category_identity = $category->slug ?: $category->id;
        }
        return route('post', [
            'categoryIdentity' =>  $category_identity,
            'postIdentity' => $this->slug ?: $this->id,
        ]);
    } 

    /**
     * Get lastest posts
     */
    public static function getLastestPosts($limit = 5) {
        return self::public()->exclude('content')->take($limit)->get();
    }

    /**
     * Get lastest posts
     */
    public static function getPopularPosts($limit = 3) {
        return self::public()->exclude('content')->take($limit)->orderBy('view_count')->get();
    }

    public static function getPostsByCategory($id = '1', $limit = 3) {
        $category = Categories::find($id);
        if(!$category) return false;
        $posts = $category->posts->take($limit);
        return $posts;
    } 
}
