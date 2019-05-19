<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ajaxModel extends Model
{
    public $incrementing = true;

    protected $primaryKey = 'id';

    protected $table = 'ajax';
    
    protected $fillable = [
        'id',
        'name'
    ];
}
