<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public $timestamps = true;
    protected $table = 'businesses';
    protected $fillable = [
        'name',
        'client',
        'consultant',
        'designer',
        'constructor',
        'contract_value',
        'contract_period',
        'scope_of_work',
        'slug',
        'category',
        'status',
        'display',
        'image'
    ];

    public function scopeShow($query) {
        return $query->where('display', true);
    }
}
