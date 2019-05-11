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
        'store_id_fk',
        'store_name',
        'store_tel',
        'store_teletex',
        'store_address',
        'store_employee',
        'store_employeeNumber',
        'bank_branch',
        'bank_number',
        'bank_account',
        'bank_name',
        'status',
        'created_at',
        'updated_at'
    ];
}
