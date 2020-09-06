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
        'contractor',
        'main_contractor',
        'contract_value',
        'contract_start',
        'contract_end',
        'scope_of_work',
        'slug',
        'category',
        'status',
        'completion',
        'display',
        'cover_image',
        'social_facebook',
        'social_youtube',
        'social_instagram',
        'priority'
    ];

    public function images()
    {
        return $this->belongsToMany('App\Image', 'business_image', 'business_id', 'image_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'businesses_categories', 'business_id', 'category_id');
    }

    public function scopeShow($query) {
        return $query->where('display', true);
    }
}
