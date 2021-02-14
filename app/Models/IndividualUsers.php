<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class IndividualUsers extends Model
{	
	use SoftDeletes;
    use HasFactory;
    protected $table = 'tbl_individual_users';

    public function cities()
    {
        return $this->belongsTo(Cities::class,'city_id');
    }

    public function areas()
    {
        return $this->hasMany(IndividualAreas::class,'individual_id');
    }
     
}
