<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    public $incrementing = true;

    protected $primaryKey = 'project_id';

    protected $table = 'projects';
    
    protected $fillable = [
        'project_id',
        'id_fk',
        'store_fk',
        'bill_fk',
        'project_department',
        'project_name',
        'project_subject',
        'project_getday',
        'project_number',
        'project_status',
        'project_orderNumber',
        'project_typemoney',
        'created_at',
        'updated_at'
    ];

    
}
