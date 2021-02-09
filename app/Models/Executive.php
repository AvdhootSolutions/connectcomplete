<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Executive extends Model
{	use SoftDeletes;
    use HasFactory;
    protected $table = 'tbl_executive';

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
        return $this->hasMany(ExecutiveAreas::class,'executive_id');
    }
    public function category()
    {
        return $this->hasMany(ExecutiveCategories::class,'executive_id');
    }

    
}
