<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Awards extends Model
{
    public $timestamps = true;
    protected $table = 'awards';
    protected $fillable = [
        'name',
        'description',
        'image_id'
    ];
}
