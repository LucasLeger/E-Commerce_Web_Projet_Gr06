<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
