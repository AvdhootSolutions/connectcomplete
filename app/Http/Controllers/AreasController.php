<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\States;
use App\Models\Cities;
use App\Models\Areas;
use App\Models\User;
use App\Models\UserAreas;
class AreasController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth');
        $this->page_data['page_title'] = 'Categories';
        
    }
    public function getCity(Request $request)
    {
         
        $state_id = (int) $request->state_id;
        if ($state_id > 0) {
            $subcategory = Cities::select(['id', 'name'])
                            ->where("state_id", $state_id)
                            ->orderBy('name')
                            ->get();
        
            return response()->json(array('status' => 'success', 'data' => $subcategory));
        }
        return response()->json(array('status' => 'error', 'data' => 'invalid request'));
    } 
    public function getAreas(Request $request)
    {
          
        $city_id = (int) $request->city_id;

        

        

        if ($city_id > 0) {
            $UserAreas = UserAreas::where('city_id',$city_id)->pluck('area_id')->toArray();
            
            $selectedAreas = Areas::select(['id', 'name'])->where("city_id", $city_id)->whereIn('id',$UserAreas)->get();
            $areas = Areas::select(['id', 'name'])
                            ->where("city_id", $city_id)
                            ->orderBy('name')
                            ->get();
        
            return response()->json(array('status' => 'success', 'data' => $areas,'selectedAreas'=>$selectedAreas));
        }
        return response()->json(array('status' => 'error', 'data' => 'invalid request'));
    } 


    public function index()
    {
        $data = [];
        $data['page_title']="Areas Listing";
        $data['areas']=Areas::with(['states','cities'])->orderBy('id','desc')->get();
         
        return view('Areas.index',compact('data'));
    }
 
    public function create()
    {
        $data = [];
        $data['page_title']="Areas create";
        $data['action']='create';
        $data['state']=States::pluck('name','id');
        $data['selectedState']='';
        $data['city']=[];
        $data['selectedCity']='';
        return view('Areas.manage',compact('data'));
    }

     
    public function store(Request $request)
    {
        $areas = new Areas();
        $areas->name = $request->name;
        $areas->state_id = $request->state_id;
        $areas->city_id = $request->city_id;
        $result = $areas->save();
        if($result==1)
        {
            return redirect()->route('areas.index')->with('success','Area Successfully Added');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        }
    }

     
    public function show($id)
    {
        //
    }

     
    public function edit($id)
    {
         $areas = Areas::find($id);
        $data = [];
        $data['page_title']="Child Category Edit";
        $data['action']='edit';
        $data['state']=States::pluck('name','id');
        $data['selectedState']=$areas->state_id;
        $data['city']=Cities::where('state_id',$areas->state_id)->pluck('name','id');
        $data['selectedCity']=$areas->city_id;
        $data['areas']=$areas;
        return view('Areas.manage',compact('data'));
    }

     
    public function update(Request $request, $id)
    {
        $childcategory = Areas::find($id);
        

        $updateArray = [
                'name'=> $request->name,
                 
                'state_id' => $request->state_id,
                'city_id' => $request->city_id
                
            ];
        
        $result = Areas::where('id',$id)->update($updateArray);
       
        if($result==1)
        {
            return redirect()->route('areas.index')->with('success','Area Successfully Update');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        } 
    }

     
    public function destroy($id)
    {
        //
    }
}
