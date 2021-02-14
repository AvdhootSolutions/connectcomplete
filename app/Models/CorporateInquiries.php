<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateInquiries extends Model
{
    use HasFactory;
    protected $table = 'tbl_corporate_inquiries';

    public function corporatedetails()
    {
    	return $this->hasMany(CorporateInquiryDetails::class,'corporate_inquiry_id');
    }

}
