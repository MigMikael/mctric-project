<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $timestamps = true;
    protected $table = 'news';
    protected $fillable = [
        'title',
        'title_th',
        'slug',
        'content',
        'content_th',
        'display',
        'cover_image_id'
    ];

    public function coverImage()
    {
        return $this->belongsTo(Image::class, 'cover_image_id');
    }
}
