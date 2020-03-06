<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessImage extends Model
{
    public $timestamps = false;
    protected $table = 'business_image';
    protected $fillable = [
        'business_id',
        'image_id'
    ];
}
