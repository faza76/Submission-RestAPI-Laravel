<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class CartItem extends Model
{
    protected $collection = 'cartitems';
    protected $fillable = ['cart_id', 'product_id', 'quantity', 'price', 'created_at', 'updated_at'];
}