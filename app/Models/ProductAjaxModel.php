<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAjaxModel extends Model
{
    public $incrementing = true;

    protected $primaryKey = 'id';

    protected $table = 'productsajax';

    protected $fillable = [
        'name', 'detail'
    ];
}
