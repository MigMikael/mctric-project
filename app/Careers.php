<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Careers extends Model
{
    public $timestamps = true;
    protected $table = 'careers';
    protected $fillable = [
        'name',
        'description',
        'qualification',
        'image_id',
        'display',
        'priority'
    ];

    public function image()
    {
        return $this->hasOne('App\Image', 'image_id');
    }

    public function scopeShow($query) {
        return $query->where('display', true);
    }
}
