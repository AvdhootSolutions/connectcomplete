<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\States;
use App\Models\Inquiries;
use App\Models\InquiryDetails;
use File;
class IndividualInquiryController extends Controller
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
        
        return view('Inquiries.index',compact('data'));
    }

    
    public function create()
    {
        //
    }

     
    public function store(Request $request)
    {
        //
    }

     
    public function show($id)
    {
        //
    }

     
    public function edit($id)
    {
        //
    }

     
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
