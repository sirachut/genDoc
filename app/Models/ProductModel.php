<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    public $incrementing = true;

    protected $primaryKey = 'product_id';

    protected $table = 'products';
    
    protected $fillable = [
        'product_id',
        'product_name',
        'product_unitname',
        'product_amount',
        'product_price',
        'project_fk',
        'created_at',
        'updated_at'
    ];
}
