<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\Cities;
use App\Models\States;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Inquiries;
use App\Models\InquiryDetails;
use File;
use Auth;
class IndividualInquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewDetails(Request $request,$id)
    {
         
        $data = [];
        $data['inquiry'] = Inquiries::where('id',$id)->first();
        $data['inquirydetails']=InquiryDetails::with('category','subcategory','childcategory')->where('inquiry_id',$id)->get();
        return view('inquiryview',compact('data'));
    }

    public function index()
    {

        $id = Auth::user()->id;
        $city_id = Auth::user()->city_id;

        $user = User::with('areas')->where('id',$id)->first();

        $userAreas = $user->areas;
        $myareas = [];
        $i=0;
        foreach ($userAreas as $key => $areas) {
            $myareas[$i]  = $areas->area_id;
            $i++;
        }
        

        $data= [];
        $data['page_title']="Inquiries Listing"; 
        $data['areas'] = Areas::whereIn('id',$myareas)->get();
        $data['category'] = Category::select('id','category_name')->get();

        //dd($data['areas']);

        $data['inquiries']=Inquiries::with(['inquirydetails','inquirydetails.category','inquirydetails.subcategory','inquirydetails.childcategory'])->where('city_id',$city_id)->whereIn('area_id',$myareas)->paginate(10); 
        
        return view('Inquiries.index',compact('data'));
    }

    
    public function search(Request $request)
    {
        $data=[]; 
        $city_id = Auth::user()->city_id;
        $user = User::with('areas')->where('id',Auth::user()->id)->first();
        $userAreas = $user->areas;
        $myareas = [];
        $i=0;
        foreach ($userAreas as $key => $areas) {
            $myareas[$i]  = $areas->area_id;
            $i++;
        }

        



        $query = Inquiries::select('*');

        $code = '';  
        if (isset($request->code)) {
            $code = $request->code;

            $query->where('code',$request->code);

         }
        $fullname='';
        if (isset($request->fullname)) {
            $fullname = $request->fullname;
            $query->where('fullname',$request->fullname);

        }
        $inquiry_status = '';
        if (isset($request->inquiry_status)) {
            $inquiry_status=$request->inquiry_status;
            $query->where('inquiry_status',$request->inquiry_status);

        }
        $inquiry_stage='';
        if (isset($request->inquiry_stage)) {
            $inquiry_stage=$request->inquiry_stage;
            $query->where('inquiry_stage',$request->inquiry_stage);

        }
        $area_id = '';
        if (isset($request->area_id)) {

             $area_id = $request->area_id;
            if(is_array($request->area_id))
            {  
                $query->whereIn('area_id',$request->area_id);
            } else {
                $query->where('area_id',$request->area_id);
            }

        }
        $category_id ='';
        if (isset($request->category_id)) {
            $category_id=$request->category_id;
            $query->whereHas('inquirydetails.category',function($query) use ($request){
                
                $query->where('id',$request->category_id);
            });

        }
        $subcategory_id='';
        if (isset($request->subcategory_id)) {
            $subcategory_id= $request->subcategory_id;
            $query->whereHas('inquirydetails.subcategory',function($query) use ($request){
                
                $query->where('id',$request->subcategory_id);
            });
        }
        $child_category_id='';
        if (isset($request->child_category_id)) {
            $child_category_id=$request->child_category_id;
            $query->whereHas('inquirydetails.childcategory',function($query) use ($request){
                
                $query->where('id',$request->child_category_id);
            });
        }

        $dates = explode(' - ', $request->inquiry_date);
        //var_dump($dates);
        $startingDate = date('Y-m-d',strtotime($dates[0]));
        $endingDate = date('Y-m-d',strtotime($dates[1]));
        if(isset($request->inquiry_date)){
            $inquiry_date = $request->inquiry_date;
            $query->whereBetween('inquiry_date',[$startingDate,$endingDate]);

        }

         
        $data['page_title']="Inquiries Listing"; 
        $data['areas'] = Areas::whereIn('id',$myareas)->get();
        $data['category'] = Category::select('id','category_name')->get();
        
        $data['inquiries'] = $query->with(['inquirydetails','inquirydetails.category','inquirydetails.subcategory','inquirydetails.childcategory'])->where('city_id',$city_id)->whereIn('area_id',$myareas)->paginate(10)->setPath ( '' ); 


        if($data['inquiries']->total()>0)
        {
            $pagination = $data['inquiries']->appends ( array (
                'code' => $code ,'category_id'=>$category_id,'fullname'=>$fullname,'area_id'=>$area_id,
                'inquiry_status'=>$inquiry_status,'inquiry_stage'=>$inquiry_stage,'subcategory_id'=>$subcategory_id,'child_category_id'=>$child_category_id,'inquiry_date'=>$inquiry_date
            ) );
        return view('Inquiries.index',compact('data'))->withQuery ( $code,$category_id );

        }
        return view('Inquiries.index',compact('data')); 

        /*if (count ( $user ) > 0)
                return view ( 'welcome' )->withDetails ( $user )->withQuery ( $q );
            }*/
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
