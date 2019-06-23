<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectorModel extends Model
{
    public $incrementing = true;

    protected $primaryKey = 'director_id';

    protected $table = 'directors';
    
    protected $fillable = [
        'teacher_getproduct_name',
        'teacher_rank',
        'parcelcheck_name',
        'headerparcel_name',
        'director_name', 
    ];
}
