<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    // public $incrementing = true;

    protected $table = 'products';
    
    protected $fillable = [
        'product_name',
        'product_unitname',
        'product_amount',
        'product_price',
        'product_sumprice',
        'created_at',
        'updated_at'
    ];
}
