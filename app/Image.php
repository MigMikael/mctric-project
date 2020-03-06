<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = true;
    protected $table = 'images';
    protected $fillable = [
        'name', 'mime', 'original_name'
    ];

    public function businesses()
    {
        return $this->belongsToMany('App\Business', 'business_image', 'image_id', 'business_id');
    }
}
