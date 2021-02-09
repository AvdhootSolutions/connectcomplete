<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tbl_employee';

    public function states()
    {
        return $this->belongsTo(States::class,'state_id');
    }

    public function cities()
    {
        return $this->belongsTo(Cities::class,'city_id');
    }

    public function areas()
    {
        return $this->hasMany(EmployeeAreas::class,'employee_id');
    }
    public function category()
    {
        return $this->hasMany(EmployeeCategories::class,'employee_id');
    }


}
