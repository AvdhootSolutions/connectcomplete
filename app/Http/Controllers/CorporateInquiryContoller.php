<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\States;
use App\Models\CorporateInquiries;
use App\Models\CorporateInquiryDetails;
use File;
class CorporateInquiryContoller extends Controller
{ 
	public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data= [];
        $data['page_title']="Inquiries Listing"; 
        $data['inquiries']=Inquiries::with(['inquirydetails','inquirydetails.category','inquirydetails.subcategory','inquirydetails.childcategory'])->get(); 
        return view('CorporateInquiry.index',compact('data'));



    }
}
