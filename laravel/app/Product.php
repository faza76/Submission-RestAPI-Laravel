<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class Product extends Model
{
    
    protected $connection = 'mongodb';
    protected $collection = 'products';
    protected $fillable = ['name', 'price', 'description','stock'];
}