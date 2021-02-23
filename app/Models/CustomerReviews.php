<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerReviews extends Model
{
    use HasFactory;
    protected $table = 'tbl_customer_reviews';

    
    public function individualUser()
    {
        return $this->belongsTo(IndividualUsers::class,'user_id');
    }

    public function childcategory()
    {
        return $this->belongsTo(ChildCategory::class,'product_id');
    }
}
