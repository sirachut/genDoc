<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class view_documents extends Model
{
    public $incrementing = true;
    // public $timestamps = false;
    protected $table = 'view_documents';
    protected $fillable = [
        'project_id', 
        'project_department', 
        'project_name', 
        'project_subject',
        'project_getday',
        'project_number', 
        'create_at', 
        'id', 
        'name',
        'store_id',
        'store_name',
        'store_tel',
        'store_teletex',
        'store_address',
        'store_employee', 
        'store_employeeNumber',
    ];
}
