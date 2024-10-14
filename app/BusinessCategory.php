<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    public $timestamps = false;
    protected $table = 'businesses_categories';
    protected $fillable = [
        'business_id',
        'category_id'
    ];
}
