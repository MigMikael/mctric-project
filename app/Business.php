<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public $timestamps = true;
    protected $table = 'businesses';
    protected $fillable = [
        'name',
        'description',
        'client',
        'consultant',
        'designer',
        'constructor',
        'contract_value',
        'contract_period',
        'scope_of_work',
        'slug',
        'category',
        'status',
        'display',
        'cover_image'
    ];

    public function images()
    {
        return $this->belongsToMany('App\Image', 'business_image', 'business_id', 'image_id');
    }

    public function scopeShow($query) {
        return $query->where('display', true);
    }
}
