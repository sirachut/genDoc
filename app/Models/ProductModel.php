<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    public $incrementing = true;

    protected $primaryKey = 'product_id';

    protected $table = 'products';
    
    protected $fillable = [
        'product_name',
        'product_price',
        'product_amount',
        'product_unitname',
        'project_fk', 
    ];
}
