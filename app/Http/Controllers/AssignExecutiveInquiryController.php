<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Areas;
use App\Models\Executive;
use App\Models\ExecutiveAreas;
use App\Models\ExecutiveCategories;
use Auth;
use Hash;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\AssignedExecutiveInquiry;

class AssignExecutiveInquiryController extends Controller
{
     
    public function assignExecutiveInquiry(Request $request,$id,$cat_id,$subcat_id,$area_id)
    {
        $inquiryid = $id;

        $data = [];
        $data['page_title'] = "Assign Inquiry To Executives";
        //Search Executive as per city/area/category/subcategory
        $data['executive']  = Executive::whereHas('areas', function ($query) use ($area_id) {
                            $query->whereIn('area_id', [$area_id]);
                        })->whereHas('category', function ($query) use($cat_id,$subcat_id) {
                            $matchCase=['category_id'=>$cat_id,'subcategory_id'=>$subcat_id];
                            $query->where($matchCase);
                        })->get();

        $alreadyAssign = AssignedExecutiveInquiry::pluck('executive_id')->toArray();                
        $data['executiveInquiry'] = AssignedExecutiveInquiry::with(['executives'])->where('inquiry_id',$id)->get();                

        return view('Inquiries.assignExecutive',compact('data','alreadyAssign')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAssignExecutiveinquiry(Request $request)
    {  
       //check already assigned or not
        
        $executiveInquiry = AssignedExecutiveInquiry::where('inquiry_id',$request->inquiry_id)->whereIn('executive_id',[$request->executive_id])->count();

      
        if($executiveInquiry==0)
        {   AssignedExecutiveInquiry::where('inquiry_id',$request->inquiry_id)->delete();

            foreach($request->executive as $key => $value)
            {

                $assigned = new AssignedExecutiveInquiry();
                $assigned->inquiry_id = $request->inquiry_id;
                $assigned->executive_id = $value;
                $result = $assigned->save();

            }

            return redirect()->back()->with('success','Executive Assigned Successfully');            
        } else {
            AssignedExecutiveInquiry::where('inquiry_id',$request->inquiry_id)->delete();

            foreach($request->executive as $key => $value)
            {

                $assigned = new AssignedExecutiveInquiry();
                $assigned->inquiry_id = $request->inquiry_id;
                $assigned->executive_id = $value;
                $result = $assigned->save();

            }


            return redirect()->back()->with('success','Executive Assigned Successfully');            
        }
        //dd($request->all(),$request->executive,$executiveInquiry);

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

     
    public function deleteExecutiveInquiry($id)
    {
          try {
            
             
            //check any subcategory exsists for these category
            $assignedExecutiveInquiry = AssignedExecutiveInquiry::find($id);
           
            $result = $assignedExecutiveInquiry->delete();
            if($result==1){
                $message = 'Executive Successfully Removed';
                return redirect()->back()->with( [ 'success' => $message ] );
            } else {
                $message = 'Oops Something went wrong try again';
                return redirect()->back()->with( [ 'error' => $message ] );
            }
        } catch (Exception $e) {
            
        }
    }
}

 