<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Areas;
use App\Models\Employee;
use App\Models\EmployeeAreas;
use App\Models\EmployeeCategories;
use Auth;
use Hash;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\AssignCrewInquiry;


class AssignCrewsInquiryController extends Controller
{
    public function assignCrewsinquiry(Request $request,$id,$cat_id,$subcat_id,$area_id)
    {
        $inquiryid = $id;

        $data = [];
        $data['page_title'] = "Assign Inquiry To Crew";
        //Search Employee as per city/area/category/subcategory
        $data['crew']  = Employee::whereHas('areas', function ($query) use ($area_id) {
                            $query->whereIn('area_id', [$area_id]);
                        })->whereHas('category', function ($query) use($cat_id,$subcat_id) {
                            $matchCase=['category_id'=>$cat_id,'subcategory_id'=>$subcat_id];
                            $query->where($matchCase);
                        })->get();

        $alreadyAssign = AssignCrewInquiry::pluck('crew_id')->toArray();                
        $data['crewInquiry'] = AssignCrewInquiry::with(['crews'])->where('inquiry_id',$id)->get();                

        return view('Inquiries.assignCrew',compact('data','alreadyAssign')); 
    }

    public function storeAssignCrewsinquiry(Request $request)
    {  
       //check already assigned or not
        
        $crewInquiry = AssignCrewInquiry::where('inquiry_id',$request->inquiry_id)->whereIn('crew_id',[$request->crew_id])->count();


        if($crewInquiry==0)
        {    AssignCrewInquiry::where('inquiry_id',$request->inquiry_id)->delete();
            
            if($request->crew!=null){
                foreach($request->crew as $key => $value)
                {
                    $assigned = new AssignCrewInquiry();
                    $assigned->inquiry_id = $request->inquiry_id;
                    $assigned->crew_id = $value;
                    $result = $assigned->save();
                }

            }

            return redirect()->back()->with('success','Crew Member Assigned Successfully');            
        } else {
            AssignCrewInquiry::where('inquiry_id',$request->inquiry_id)->delete();

            foreach($request->crew as $key => $value)
            {

                $assigned = new AssignCrewInquiry();
                $assigned->inquiry_id = $request->inquiry_id;
                $assigned->crew_id = $value;
                $result = $assigned->save();

            }


            return redirect()->back()->with('success','Crew Member Assigned Successfully');            
        }
        

    }

    public function deleteCrewInquiry($id)
    {
          try {
            //check any subcategory exsists for these category
            $assignedCrewInquiry = AssignCrewInquiry::find($id);
           
            $result = $assignedCrewInquiry->delete();
            if($result==1){
                $message = 'Crew Member Successfully Removed';
                return redirect()->back()->with( [ 'success' => $message ] );
            } else {
                $message = 'Oops Something went wrong try again';
                return redirect()->back()->with( [ 'error' => $message ] );
            }
        } catch (Exception $e) {
            
        }
    }

    
}
