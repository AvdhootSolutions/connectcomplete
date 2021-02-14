<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiries extends Model
{
    use HasFactory;
    protected $table = 'tbl_inquiries';

    public function inquirydetails()
    {
    	return $this->hasMany(InquiryDetails::class,'inquiry_id');
    }
}
