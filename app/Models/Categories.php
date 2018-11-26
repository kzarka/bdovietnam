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
        'enable',
        'desc_normal',
        'desc_awaken',
        'has_awk',
        'normal_video',
        'awaken_video',
        'normal_img',
        'awaken_img'
    ];
}
