<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiries;
use App\Models\InquiryDetails;
use Auth;
class InquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [];

        $data['page_title']='Inquiries';
        $id = Auth::user()->id;
        $city_id = Auth::user()->city_id;
        $data['inquiries']=Inquiries::with(['category','subcategory','childcategory']) 
                            ->orderBy('id')
                            ->get();
        //return view('Inquiries.index',compact('data'));
    }

}
