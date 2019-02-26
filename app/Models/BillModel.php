<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillModel extends Model
{
    public $incrementing = true;

    protected $table = 'bills';
    
    protected $fillable = [
        'bill_id',
        'bill_number',
        'created_at',
        'updated_at'
    ];
}
