<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategoryImages extends Model
{
    use HasFactory;
    protected $table = 'tbl_child_category_images';

    
    public function category()
    {
    	return $this->belongsTo(ChildCategory::class,'child_category_id');
    }
}
