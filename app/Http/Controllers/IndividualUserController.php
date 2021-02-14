<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndividualUsers;
use App\Models\IndividualAreas;
use Response;
use Auth;
use App\Models\Areas;
class IndividualUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = [];

        $data['page_title']='Individual Users';
        $id = Auth::user()->id;
        $city_id = Auth::user()->city_id;
        $data['areas']=Areas::select(['id', 'name'])
                            ->where("city_id", $city_id)
                            ->orderBy('name')
                            ->get();
        $data['users'] = IndividualUsers::with(['cities'])->orderBy('id','desc')->get();
        return view('Individual.index',compact('data'));
    }


    public function searchIndividual(Request $request)
    {
        $id = Auth::user()->id;
        $city_id = Auth::user()->city_id;

        $query = IndividualUsers::where('city_id',$city_id);
         
        if(isset($request->username) && $request->username !="")
        {
            $query->where('name','LIKE', "%$request->username%");

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
        return view('Individual.index',compact('data'));
    }

    public function updatestatus(Request $request)
    {
        $id= $request->id;
        $status = $request->status;
        $result = IndividualUsers::where('id',$id)->update(['status'=>$status]);

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
        $data = [];
        $data['users'] = IndividualUsers::with(['areas.areas','cities'])->where('id',$id)->first();
        $data['page_title']="View Individual Users";
        return view('Individual.show',compact('data')); 
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
