<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;
    protected $table = 'tbl_areas';

    public function states()
    {
    	return $this->belongsTo(States::class,'state_id');
    }

    public function cities()
    {
    	return $this->belongsTo(Cities::class,'city_id');
    }
}
