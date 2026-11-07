<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    public $timestamps = true;
    protected $table = 'managements';
    protected $fillable = [
        'first_name',
        'last_name',
        'job_title',
        'priority',
        'display',
        'image_id'
    ];

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
