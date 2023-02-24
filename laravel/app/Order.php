<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class Order extends Model
{
    protected $collection = 'orders';
    protected $fillable = ['cart_id', 'total_price', 'created_at', 'updated_at'];
}