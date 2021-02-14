<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CorporateUsers;
use App\Models\CorporateAreas;
use Response;
use Auth;
use App\Models\Areas;
class CorporateUserController extends Controller
{
     
    public function index()
    {
        $data = [];
        $data['page_title']='Corporate Users';
        $city_id = Auth::user()->city_id;
        $data['areas']=Areas::select(['id', 'name'])
                            ->where("city_id", $city_id)
                            ->orderBy('name')
                            ->get();

        $data['users'] = CorporateUsers::with(['cities'])->orderBy('id','desc')->get();
        return view('CorporateUsers.index',compact('data'));
    }

    public function searchCorporate(Request $request)
    {
        $id = Auth::user()->id;
        $city_id = Auth::user()->city_id;

        $query = CorporateUsers::where('city_id',$city_id);
         
        if(isset($request->username) && $request->username !="")
        {
            $query->where('company_name','LIKE', "%$request->username%");

            $data['name'] = $request->username;
             
        }
        
        if(isset($request->mobile_number) && $request->mobile_number !="")
        {
            $data['mobile_number'] = $request->mobile_number;
            $query->where('mobile_number',$request->mobile_number);
        }
        if(isset($request->email) && $request->email !="")
        {
            $data['email'] = $request->email;
            $query->where('email',$request->email);
        }
        if(isset($request->areas) && $request->areas !="")
        {
            $data['selectedareas'] = $request->areas;
            $query->whereHas('areas', function($query)use($request){
                    $query->whereIn('area_id', $request->areas);
                });
        }
   
         

        $data['page_title']="Individual Listing";
         

        $data['areas']=Areas::select(['id', 'name'])
                            ->where("city_id", $city_id)
                            ->orderBy('name')
                            ->get();

        $data['users'] = $query->orderBy('id','desc')->get();
        return view('CorporateUsers.index',compact('data'));
    }
    
    public function updatestatus(Request $request)
    {
        $id= $request->id;
        $status = $request->status;
        $result = CorporateUsers::where('id',$id)->update(['status'=>$status]);

        if($result==1){
            return Response::json(["status"=>"success","message"=>"User Status Updated"]);
        } else {
            return Response::json(["status"=>"error","message"=>"Oops Something Went Wrong Try Again"]);
        }
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
        $data = [];
        $data['users'] = CorporateUsers::with(['areas.areas','cities'])->where('id',$id)->first();
        $data['page_title']="View Corporate Users";
        return view('CorporateUsers.show',compact('data'));
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
