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
use App\Http\Requests\AssignCategoryRequest;

class ExecutiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->page_data['page_title'] = 'Executive';
    }

    public function searchExecutive(Request $request)
    {
        //dd($request->all());
        $id = Auth::user()->id;
        $city_id = Auth::user()->city_id;
        $query = Executive::where('city_admin_id',$id);

        if(isset($request->username) && $request->username !="")
        {
            $data['name'] = $request->username;
            $query->where('name',$request->username);
        }
        if(isset($request->mobile_number) && $request->mobile_number !="")
        {
            $data['mobile_number'] = $request->mobile_number;
            $query->where('mobile_number',$request->mobile_number);
        }
        if(isset($request->areas) && $request->areas !="")
        {
            $data['selectedareas'] = $request->areas;
            $query->whereHas('areas', function($query)use($request){
                    $query->whereIn('area_id', $request->areas);
                });
        }
    
   
        if(isset($request->category_id) && $request->category_id !="")
        {   
             
            $data['selectedCategory'] = $request->category_id;
            
            $query->whereHas('category', function($query)use($request){
                    $query->where('category_id', $request->category_id);
                });
        }
        if(isset($request->subcategory_id) && $request->subcategory_id !="")
        {
            

            $data['subcategory'] = Subcategory::where('category_id',$request->category_id)->pluck('subcategory_name','id');
            
            $data['selectedSubCategory'] = $request->subcategory_id;
            $query->whereHas('category', function($query)use($request){
                    $query->where('subcategory_id', $request->subcategory_id);
            });
        } else {
             $data['subcategory']=[];
        }

        $data['page_title']="Executive Listing";
        $data['category']=Category::pluck('category_name','id');

        $data['areas']=Areas::select(['id', 'name'])
                            ->where("city_id", $city_id)
                            ->orderBy('name')
                            ->get();

        $data['executive'] = $query->orderBy('id','desc')->get();
        return view('Executive.index',compact('data'));
    }


    public function index()
    {
        $data = [];
        $data['page_title']="Executive Listing";
        $id = Auth::user()->id;

        $city_id = Auth::user()->city_id;

        $data['areas']=Areas::select(['id', 'name'])
                            ->where("city_id", $city_id)
                            ->orderBy('name')
                            ->get();
        
        $data['category']=Category::pluck('category_name','id');
        $data['selectedCategory']="";

        $data['childcategory']=[];
        $data['selectedCategory']="";
    
        $data['subcategory']=[];


        $data['executive']=Executive::where('city_admin_id',$id)->orderBy('id','desc')->get();
        return view('Executive.index',compact('data'));
    }


     public function create()
    {
        $data = [];
        $data['page_title']="Create Executive";
        $data['action'] ="create";
       	$cityId = Auth::user()->city_id; 
        
        $data['areas'] = Areas::where('city_id',$cityId)->get();
       	$executiveAreas = ExecutiveAreas::where('city_id',$cityId)->pluck('area_id')->toArray();
        $areas = Areas::select(['id', 'name'])->where("city_id", $cityId)->whereIn('id',$executiveAreas)->get();
        $data['assignedAreas'] = $areas;
        return view('Executive.manage',compact('data'));   
    }

    public function store(Request $request)
    {
    	if ($request->hasFile('profile_image')) {
            $this->validate($request, [
                 'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $profPic = $request->file('profile_image');
            $profileImage = time().'.'.$profPic->getClientOriginalExtension();
            $destinationPath = public_path('/executiveprofilepic');
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
            $destinationPath = public_path('/executivegovementproff');
            $govPic->move($destinationPath, $govementProff);
        } else {
            $govementProff ='';
        }

        if ($request->hasFile('police_verification')) {
            $this->validate($request, [
                 'police_verification' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $PolicePic = $request->file('police_verification');
            $policeverificationProff = time().'.'.$PolicePic->getClientOriginalExtension();
            $destinationPath = public_path('/executivePoliceproff');
            $PolicePic->move($destinationPath, $policeverificationProff);
        } else {
            $policeverificationProff ='';
        }



        $executive = new Executive();
        $executive->city_admin_id = Auth::user()->id;
        $executive->city_id = Auth::user()->city_id;
        $executive->name = $request->username;
        $executive->email = $request->email;
        $executive->password = Hash::make($request->password);
        $executive->designation = $request->designation;
        $executive->mobile_number = $request->mobile_number;
    
        $executive->remarks = $request->remarks;
        $executive->profile_pic = $profileImage;
        $executive->goverment_proff = $govementProff;
        $executive->police_verification = $policeverificationProff;
        $executive->experience = $request->experience;
        $executive->save();
        

        $executiveId = $executive->id;

        foreach ($request->areas as $key => $area_id) {
            $userAreas = new ExecutiveAreas();
            $userAreas->executive_id = $executiveId;
            $userAreas->city_id = Auth::user()->city_id;
            $userAreas->area_id = $area_id;
            $userAreas->save();
        }
        return redirect()->route('executives.index')->with('success','Executive Successfully Added');
    }


    public function show($id)
    {
        $data = [];
        $data['users'] = Executive::with(['areas.areas','category.category','category.subcategory'])->where('id',$id)->first();


        $data['page_title']="View Crew Member";
        return view('Executive.show',compact('data'));
    }






    public function edit(Request $request,$id)
    {
    	$users = Executive::find($id);
        $data = [];
        $data['page_title']="edit Executive";
        $data['action']="edit"; 
        $data['user'] = $users;

         
        $cityId = Auth::user()->city_id;
        
        $data['areas'] = Areas::where('city_id',$cityId)->get();
       	$data['executiveAreas'] = ExecutiveAreas::where('city_id',$cityId)->pluck('area_id')->toArray();
       	$executiveAreas = ExecutiveAreas::where('city_id',$cityId)->pluck('area_id')->toArray();


        $areas = Areas::select(['id', 'name'])->where("city_id", $cityId)->whereIn('id',$executiveAreas)->get();
        $data['assignedAreas'] = $areas;
        
        
        return view('Executive.manage',compact('data'));
    }

    public function update(Request $request, $id)
    {	
    	$user = Executive::find($id);
    	if ($request->hasFile('profile_image')) {
            $this->validate($request, [
                 'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $destinationPath = public_path('/executiveprofilepic');
            File::delete($destinationPath.'/'.$user->profile_pic);
            
            $profPic = $request->file('profile_image');
            $profileImage = time().'.'.$profPic->getClientOriginalExtension();
            $destinationPath = public_path('/executiveprofilepic');
            $profPic->move($destinationPath, $profileImage);

        } else {
            $profileImage =$user->profile_pic;
        }

        if ($request->hasFile('govement_proff')) {
            $this->validate($request, [
                 'govement_proff' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $destinationPath = public_path('/executivegovementproff');
            File::delete($destinationPath.'/'.$user->govement_proff);
            $govPic = $request->file('govement_proff');
            $govementProff = time().'.'.$govPic->getClientOriginalExtension();
            $destinationPath = public_path('/executivegovementproff');
            $govPic->move($destinationPath, $govementProff);
        } else {
            $govementProff =$user->goverment_proff;
        }

        if ($request->hasFile('police_verification')) {
            $this->validate($request, [
                 'police_verification' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $destinationPath = public_path('/executivePoliceproff');
            File::delete($destinationPath.'/'.$user->police_verification);
            $PolicePic = $request->file('police_verification');
            $policeverificationProff = time().'.'.$PolicePic->getClientOriginalExtension();
            $destinationPath = public_path('/executivePoliceproff');
            $PolicePic->move($destinationPath, $policeverificationProff);
        } else {
            $policeverificationProff =$user->police_verification;
        }

        if($request->has('password') && $request->password!="")
        {
            $password = Hash::make($request->password);   
        } else {
            $password = $user->password;
        }

        ExecutiveAreas::where('executive_id',$id)->delete();
        foreach ($request->areas as $key => $area_id) {
            $userAreas = new ExecutiveAreas();
            $userAreas->executive_id =  $id;
            $userAreas->city_id = Auth::user()->city_id;
            $userAreas->area_id = $area_id;
            $userAreas->save();
        }


        $updateArray = ['name'=>$request->username,'email'=>$request->email,'password'=>$password,'designation'=>$request->designation,'mobile_number'=>$request->mobile_number,'profile_pic'=>$profileImage,'goverment_proff'=>$govementProff,'police_verification'=>$policeverificationProff,'experience'=>$request->experience];
         

        $result = Executive::where('id',$id)->update($updateArray);
        if($result==1){
            return redirect()->route('executives.index')->with('success','Executive Successfully Updated');
        } else{
            return redirect()->back()->with('success','Executive Successfully Updated');
        }
       
    }

    public function destroy($id)
    {
        ExecutiveAreas::where('executive_id',$id)->delete();
        $user = Executive::find($id);

         $destinationPath = public_path('/executiveprofilepic');
        File::delete($destinationPath.'/'.$user->profile_pic);

        $destinationPathOne = public_path('/executivegovementproff');
        File::delete($destinationPathOne.'/'.$user->goverment_proff);

        $destinationPathOne = public_path('/executivePoliceproff');
        File::delete($destinationPathOne.'/'.$user->police_verification);
        


        $result = $user->delete();
        if($result==1){
            $message = 'Executive Successfully Deleted';
            return redirect()->route('executives.index')->with( [ 'success' => $message ] );
        } else {
            $message = 'Oops Something went wrong try again';
            return redirect()->route('executives.index')->with( [ 'error' => $message ] );
        }
    }

    public function assignCategory($id)
    {
        $data = [];
        $data['page_title']="Assign Category";
        $data['category']=Category::pluck('category_name','id');
        $data['subcategory']=[];
        $data['executiveCategory'] = ExecutiveCategories::with(['category','subcategory'])->where('executive_id',$id)->get();
        return view('Executive.Category.index',compact('data'));
    }

    public function assignCategoryStore(AssignCategoryRequest $request)
    {
        $matchExists = ['executive_id'=>$request->executive_id,'category_id'=>$request->category_id,'subcategory_id'=>$request->subcategory_id];

        $count = ExecutiveCategories::where($matchExists)->count();
        if($count==0)
        {
            $executiveCategory = new ExecutiveCategories();
            $executiveCategory->executive_id = $request->executive_id;
            $executiveCategory->category_id = $request->category_id;
            $executiveCategory->subcategory_id =$request->subcategory_id;
            $result = $executiveCategory->save();
            if($result==1){
                $message = 'Executive Category Successfully Assigned';
                return redirect()->back()->with( [ 'success' => $message ] );
            } else {
                $message = 'Oops Something went wrong try again';
                return redirect()->back()->with( [ 'error' => $message ] );
            }
        } else {
                $message = 'These Category & Subcategory is Already Assigned';
                return redirect()->back()->with( [ 'error' => $message ] );
        }   
    }

    public function executiveCategoryDelete($id)
    {
        $executiveCategory = ExecutiveCategories::find($id);
        $result = $executiveCategory->delete();
        if($result==1){
            $message = 'Executive Category Successfully Deleted';
            return redirect()->back()->with( [ 'success' => $message ] );
        } else {
            $message = 'Oops Something went wrong try again';
            return redirect()->back()->with( [ 'error' => $message ] );
        }
    }

}
