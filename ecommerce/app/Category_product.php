<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_product extends Model
{
    protected $table = 'category_product';
    protected $fillable = [
        'id', 'category_id', 'product_id',
    ];

    public function product_id()
    {
        return $this->belongsToMany('App\Product');
    }
    public function category_id()
    {
        return $this->belongsToMany('App\Category');
    }
}
