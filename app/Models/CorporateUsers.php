<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CorporateUsers extends Model
{	
	use SoftDeletes;
    use HasFactory;
    protected $table = 'tbl_corporate_users';

    public function cities()
    {
        return $this->belongsTo(Cities::class,'city_id');
    }

    public function areas()
    {
        return $this->hasMany(CorporateAreas::class,'corporate_id');
    }

    public function category()
    {
        return $this->hasMany(CorporateCategory::class,'corporate_id');
    }
     
}
