<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = true;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
    ];

    public function businesses()
    {
        return $this->belongsToMany('App\Business', 'businesses_categories', 'category_id', 'business_id');
    }
}
