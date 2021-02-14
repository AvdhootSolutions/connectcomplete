<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateInquiryDetails extends Model
{
    use HasFactory;

    protected $table = 'tbl_corporate_inquiries_details';

    public function category()
    {
    	return $this->belongsTo(CorporateCategory::class,'corporate_cat_id');
    }

    public function subcategory()
    {
    	return $this->belongsTo(CorporateSubcategory::class,'corporate_subcat_id');
    }

    public function childcategory()
    {
    	return $this->belongsTo(CorporateChildCategory::class,'corporate_childcat_id');
    }
}
