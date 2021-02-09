<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCategories extends Model
{
    use HasFactory;
    protected $table = 'tbl_employee_categories';

    public function category()
    {
    	return $this->belongsTo(Category::class,'category_id');
    }

    public function subcategory()
    {
    	return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
    
}
