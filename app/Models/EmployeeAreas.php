<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAreas extends Model
{
    use HasFactory;
    protected $table = 'tbl_employee_areas';

    public function areas()
    {
        return $this->belongsTo(Areas::class,'area_id');
    }
}
