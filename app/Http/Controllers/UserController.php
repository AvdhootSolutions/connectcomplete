<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
 
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\States;
use App\Models\Cities;
use App\Models\Areas;
use App\Models\UserAreas;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->page_data['page_title'] = 'Users';
        
    }

    public function index()
    {
        $data = [];
        $data['page_title']="City Admin";
        $data['users']=User::with(['states','cities'])->role('cityadmin')->get(); 
        return view('Users.index',compact('data'));
    }

     
    public function create()
    {
        $data = [];
        $data['page_title']="Creat City Admin";
        $data['action'] ="create";
        $data['state']=States::pluck('name','id');
        $data['selectedState']='';
        $data['city']=[];
        $data['selectedCity']='';

        return view('Users.manage',compact('data'));   
    }

    
    public function store(Request $request)
    {    
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        $user->assignRole('cityadmin');

        $userId = $user->id;
        foreach ($request->areas as $key => $area_id) {
            $userAreas = new UserAreas();
            $userAreas->user_id = $userId;
            $userAreas->city_id = $request->city_id;
            $userAreas->area_id = $area_id;
            $userAreas->save();
        }



            return redirect()->route('users.index')->with('success','City Admin Successfully Added');
         
    }

     
    public function show($id)
    {
         
    }

     
    public function edit($id)
    {
        $users = User::find($id);
        $data = [];
        $data['page_title']="edit User";
        $data['action']="edit"; 
        $data['user'] = $users;

        $data['state']=States::pluck('name','id');
        $data['selectedState']=$users->state_id;
        $data['city']=Cities::where('state_id',$users->state_id)->pluck('name','id');
        $data['selectedCity']=$users->city_id;

        $data['areas'] = Areas::where('city_id',$users->city_id)->get();
        $data['userAreas'] = UserAreas::where('user_id',$id)->pluck('area_id')->toArray();



        $UserAreas = UserAreas::where('city_id',$users->city_id)->pluck('area_id')->toArray();
            
        $areas = Areas::select(['id', 'name'])->where("city_id", $users->city_id)->whereIn('id',$UserAreas)->get();

        $data['assignedAreas'] = $areas;
        
        

          
        return view('Users.manage',compact('data'));
    }
   
    public function update(UserRequest $request, $id)
    {
         dd($request->all());
    }

     
    public function destroy($id)
    {
        //
    }
}
