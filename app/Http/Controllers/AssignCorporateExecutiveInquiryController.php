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
use App\Models\AssignCorporateExecutive;


class AssignCorporateExecutiveInquiryController extends Controller
{
     
    public function assignCorporateExecutiveinquiry(Request $request,$id,$cat_id,$subcat_id,$area_id)
    {
        $inquiryid = $id;

        $data = [];
        $data['page_title'] = "Assign Corporate Inquiry To Executives";
        //Search Employee/crew as per city/area/category/subcategory


        $data['executive']  = Executive::whereHas('areas', function ($query) use ($area_id) {
                            $query->whereIn('area_id', [$area_id]);
                        })->whereHas('category', function ($query) use($cat_id,$subcat_id) {
                            $matchCase=['category_id'=>$cat_id,'subcategory_id'=>$subcat_id];
                            $query->where($matchCase);
                        })->get();
       
       
        $alreadyAssign = AssignCorporateExecutive::pluck('executive_id')->toArray();                
        $data['execitveInquiry'] = AssignCorporateExecutive::with(['executives'])->where('inquiry_id',$id)->get(); 
        

         

                    

        return view('CorporateInquiry.assignExecutive',compact('data','alreadyAssign')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeAssignCorporateExecutiveinquiry(Request $request)
    {
         $executiveInquiry = AssignCorporateExecutive::where('inquiry_id',$request->inquiry_id)->whereIn('executive_id',[$request->executive_id])->count();


        if($executiveInquiry==0)
        {
            AssignCorporateExecutive::where('inquiry_id',$request->inquiry_id)->delete();
            if($request->executive!=null){
                foreach($request->executive as $key => $value)
                {
                    $assigned = new AssignCorporateExecutive();
                    $assigned->inquiry_id = $request->inquiry_id;
                    $assigned->executive_id = $value;
                    $result = $assigned->save();
                }

            }
            return redirect()->back()->with('success','Executive Assigned Successfully');
        } else {
            AssignCorporateExecutive::where('inquiry_id',$request->inquiry_id)->delete();
            foreach($request->executive as $key => $value)
            {
                $assigned = new AssignCorporateExecutive();
                $assigned->inquiry_id = $request->inquiry_id;
                $assigned->executive_id = $value;
                $result = $assigned->save();

            }


            return redirect()->back()->with('success','Executive Assigned Successfully');            
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
    public function deleteCorporateExecutiveInquiry($id)
    {
          try {
            
             
            //check any subcategory exsists for these category
            $assignedExecutiveInquiry = AssignCorporateExecutive::find($id);
           
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
