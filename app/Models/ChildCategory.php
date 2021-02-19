<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ChildCategory extends Model
{   use SoftDeletes;
    use HasFactory;
    protected $table = 'tbl_child_category';

    
    public function category()
    {
    	return $this->belongsTo(Category::class,'category_id');
    }

    public function subcategory()
    {
    	return $this->belongsTo(Subcategory::class,'subcategory_id');
    }

    public function gallery()
    {
        return $this->belongsTo(ChildCategoryImages::class,'child_category_id','id');
    }


    
}
