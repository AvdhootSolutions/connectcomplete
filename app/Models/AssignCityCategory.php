<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignCityCategory extends Model
{
    use HasFactory;

    protected $table = 'tbl_cities_category';

    public function cities()
    {
        return $this->belongsTo(Cities::class,'city_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
