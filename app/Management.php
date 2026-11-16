<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    public $timestamps = true;
    protected $table = 'managements';
    protected $fillable = [
        'first_name',
        'first_name_th',
        'last_name',
        'last_name_th',
        'job_title',
        'job_title_th',
        'priority',
        'display',
        'image_id'
    ];

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
