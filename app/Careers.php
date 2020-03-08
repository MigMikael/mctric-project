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
        'image_id'
    ];
}
