<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedExecutiveInquiry extends Model
{
    use HasFactory;

    protected $table = 'tbl_assigned_executive_inquiry';

    public function executives()
    {
    	return $this->belongsTo(Executive::class,'executive_id');
    }

}
