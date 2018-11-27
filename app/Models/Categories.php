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
        'parent_id',
        'desc',
        'slug'
    ];

    public static function getName($id) {
        return self::select('name')
            ->where('id', $id)
            ->first()['name'] ?: '';
    }
}
