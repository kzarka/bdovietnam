<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'active',
        'desc',
        'slug'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Models\Categories','parent_id')->where('parent_id',0)->with('parent');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Categories','parent_id')->with('children');
    }

    public static function getName($id) {
        return self::select('name')
            ->where('id', $id)
            ->first()['name'] ?: '';
    }
}
