<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryDetails extends Model
{
    use HasFactory;
    protected $table = 'tbl_inquiry_details';

    public function category()
    {
    	return $this->belongsTo(Category::class,'cat_id');
    }

    public function subcategory()
    {
    	return $this->belongsTo(Subcategory::class,'subcat_id');
    }

    public function childcategory()
    {
    	return $this->belongsTo(ChildCategory::class,'childcat_id');
    }
}
