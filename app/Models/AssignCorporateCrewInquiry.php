<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignCorporateCrewInquiry extends Model
{
    use HasFactory;
     protected $table = 'tbl_assigned_corporate_crew_inquiry_table';

    public function crews()
    {
    	return $this->belongsTo(Employee::class,'crew_id');
    }

}
