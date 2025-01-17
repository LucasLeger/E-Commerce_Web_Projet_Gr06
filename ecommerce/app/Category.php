<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id', 'name', 'slug',
    ];
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
