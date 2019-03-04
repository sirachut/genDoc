<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreModel extends Model
{
    public $incrementing = true;

    protected $table = 'stores';

    protected $primaryKey = 'store_id';

    
    protected $fillable = [
        'store_id',
        'id_fk',
        'store_name',
        'store_tel',
        'store_tetetex',
        'store_address',
        'store_employee',
        'store_employeeNumber',
        'bank_branch',
        'bank_number',
        'bank_account',
        'bank_name',
        'created_at',
        'updated_at'
    ];
}
