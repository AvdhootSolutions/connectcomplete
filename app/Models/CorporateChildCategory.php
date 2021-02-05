<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CorporateChildCategory extends Model
{   use SoftDeletes;
    use HasFactory;
    protected $table = 'tbl_corporate_child_category';

    
    public function category()
    {
    	return $this->belongsTo(CorporateCategory::class,'category_id');
    }

    public function subcategory()
    {
    	return $this->belongsTo(CorporateSubcategory::class,'subcategory_id');
    }


    
}
