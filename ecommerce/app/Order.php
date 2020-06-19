<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getPrice()
    {
        $amount = $this->amount / 100;

        return number_format($amount, 2, ',', ' ') . ' €';
    }
    
    public function gameCode(){
        $code = Str::random(16);
       }
}
