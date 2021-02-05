<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CorporateSubcategory extends Model
{	use SoftDeletes;
    use HasFactory;
    protected $table = 'tbl_corporate_sub_categories';
}
