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
use Hash;
use File;
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

    
    public function store(UserRequest $request)
    {    
        if ($request->hasFile('profile_image')) {
            $this->validate($request, [
                 'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $profPic = $request->file('profile_image');
            $profileImage = time().'.'.$profPic->getClientOriginalExtension();
            $destinationPath = public_path('/profilepic');
            $profPic->move($destinationPath, $profileImage);
        } else {
            $profileImage ='';
        }

        if ($request->hasFile('govement_proff')) {
            $this->validate($request, [
                 'govement_proff' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $govPic = $request->file('govement_proff');
            $govementProff = time().'.'.$govPic->getClientOriginalExtension();
            $destinationPath = public_path('/govementproff');
            $govPic->move($destinationPath, $govementProff);
        } else {
            $govementProff ='';
        }



        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->designation = $request->designation;
        $user->mobile_number = $request->mobile_number;
        $user->state_id = $request->state_id;
        $user->city_id = $request->city_id;
        $user->remarks = $request->remarks;
        $user->profile_image = $profileImage;
        $user->govement_proff = $govementProff;
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
        $user = User::find($id);

        if ($request->hasFile('profile_image')) {
            
            $destinationPath = public_path('/profilepic');
            File::delete($destinationPath.'/'.$user->profile_image);
            
            $this->validate($request, [
                 'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $profPic = $request->file('profile_image');
            $profileImage = time().'.'.$profPic->getClientOriginalExtension();
            $destinationPath = public_path('/profilepic');
            $profPic->move($destinationPath, $profileImage);

        } else {
            $profileImage =$user->profile_image;
        }



        if ($request->hasFile('govement_proff')) {
            
            $destinationPath = public_path('/govementproff');
            File::delete($destinationPath.'/'.$user->govement_proff);
            
            $this->validate($request, [
                 'govement_proff' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $govPic = $request->file('govement_proff');
            $govementproff = time().'.'.$govPic->getClientOriginalExtension();
            $destinationPath = public_path('/govementproff');
            $govPic->move($destinationPath, $govementproff);

        } else {
            $govementproff =$user->govement_proff;
        }



        if($request->has('password') && $request->password!="")
        {
            $password = Hash::make($request->password);   
        } else {
            $password = $user->password;
        }

        UserAreas::where('user_id',$id)->delete();
        foreach ($request->areas as $key => $area_id) {
            $userAreas = new UserAreas();
            $userAreas->user_id = $user->id;
            $userAreas->city_id = $request->city_id;
            $userAreas->area_id = $area_id;
            $userAreas->save();
        }


        $updateArray = ['user_type'=>$request->user_type,'name'=>$request->username,'email'=>$request->email,'state_id'=>$request->state_id,'city_id'=>$request->city_id,'remarks'=>$request->remarks,'profile_image'=>$profileImage,'govement_proff'=>$govementproff,'designation'=>$request->designation,'mobile_number'=> $request->mobile_number];

        $result = User::where('id',$id)->update($updateArray);

        if($result==1){
            return redirect()->route('users.index')->with('success','City Admin Successfully Updated');
        } else{
            return redirect()->back()->with('success','City Admin Successfully Updated');
        }
    //    dd($request->all());
    }

     
    public function destroy($id)
    {
        UserAreas::where('user_id',$id)->delete();
        $user = User::find($id);
        
        $destinationPath = public_path('/profilepic');
        File::delete($destinationPath.'/'.$user->profile_image);

        $destinationPathOne = public_path('/govementproff');
        File::delete($destinationPathOne.'/'.$user->govement_proff);
        

        $result = $user->delete();
        if($result==1){
            $message = 'City Admin Successfully Deleted';
            return redirect()->route('users.index')->with( [ 'success' => $message ] );
        } else {
            $message = 'Oops Something went wrong try again';
            return redirect()->route('users.index')->with( [ 'error' => $message ] );
        }
    }
}
