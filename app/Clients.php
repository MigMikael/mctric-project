<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    public $timestamps = true;
    protected $table = 'clients';
    protected $fillable = [
        'name',
        'description',
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
