<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignCrewInquiry extends Model
{
    use HasFactory;
    

    protected $table = 'tbl_assign_crew_inquiries';

    public function crews()
    {
    	return $this->belongsTo(Employee::class,'crew_id');
    }
}
