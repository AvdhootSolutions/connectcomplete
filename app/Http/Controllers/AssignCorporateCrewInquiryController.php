<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\EmployeeAreas;
use App\Models\EmployeeCategories;
use App\Models\AssignCorporateCrewInquiry;


class AssignCorporateCrewInquiryController extends Controller
{
     public function assignCorporateCrewsinquiry(Request $request,$id,$cat_id,$subcat_id,$area_id)
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

        $alreadyAssign = AssignCorporateCrewInquiry::pluck('crew_id')->toArray();                
        $data['crewInquiry'] = AssignCorporateCrewInquiry::with(['crews'])->where('corporate_inquiry_id',$id)->get();                

        return view('CorporateInquiry.assignCrew',compact('data','alreadyAssign')); 
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeAssignCorporateCrewsinquiry(Request $request)
    {  
       //check already assigned or not
        
        $crewInquiry = AssignCorporateCrewInquiry::where('corporate_inquiry_id',$request->inquiry_id)->whereIn('corporate_id',[$request->crew_id])->count();


        if($crewInquiry==0)
        {    AssignCorporateCrewInquiry::where('corporate_inquiry_id',$request->inquiry_id)->delete();
            
            if($request->crew!=null){
                foreach($request->crew as $key => $value)
                {
                    $assigned = new AssignCorporateCrewInquiry();
                    $assigned->corporate_inquiry_id = $request->inquiry_id;
                    $assigned->corporate_id = $value;
                    $result = $assigned->save();
                }

            }

            return redirect()->back()->with('success','Crew Member Assigned Successfully');            
        } else {
            AssignCorporateCrewInquiry::where('inquiry_id',$request->inquiry_id)->delete();

            foreach($request->crew as $key => $value)
            {

                $assigned = new AssignCorporateCrewInquiry();
                $assigned->corporate_inquiry_id = $request->inquiry_id;
                $assigned->corporate_id = $value;
                $result = $assigned->save();

            }


            return redirect()->back()->with('success','Crew Member Assigned Successfully');            
        }
        

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
