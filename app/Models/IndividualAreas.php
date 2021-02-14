<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualAreas extends Model
{
    use HasFactory;
    protected $table = 'tbl_individual_area';

    public function areas()
    {
        return $this->belongsTo(Areas::class,'area_id');
    }
}
