<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\EmployeeAreas;
use App\Models\EmployeeCategories;
use Auth;
use Hash;
use App\Models\Areas;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Requests\AssignCategoryRequest;
class EmployeeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->page_data['page_title'] = 'Crew Member';
        
    }
    public function searchEmployee(Request $request)
    {
        //dd($request->all());
        $id = Auth::user()->id;
        $city_id = Auth::user()->city_id;
        $query = Employee::where('city_admin_id',$id);

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

        $data['page_title']="Employee Listing";
        $data['category']=Category::pluck('category_name','id');

        $data['areas']=Areas::select(['id', 'name'])
                            ->where("city_id", $city_id)
                            ->orderBy('name')
                            ->get();


        $data['employee'] = $query->orderBy('id','desc')->get();
        return view('Employee.index',compact('data'));
    }

    public function index()
    {
        $data= [];
        $data['page_title']='Crew Member Listing';
        $city_id = Auth::user()->city_id;

        $id = Auth::user()->id;
        $data['areas']=Areas::select(['id', 'name'])
                            ->where("city_id", $city_id)
                            ->orderBy('name')
                            ->get();
        
        $data['category']=Category::pluck('category_name','id');
        $data['selectedCategory']="";

        $data['childcategory']=[];
        $data['selectedCategory']="";
        $data['subcategory']=[];
        $data['employee']=Employee::where('city_admin_id',$id)->orderBy('id','desc')->get();
        return view('Employee.index',compact('data'));
    }

    
    public function create()
    {
        $data = [];
        $data['page_title']="Create Crew Member";
        $data['action'] ="create";
        $cityId = Auth::user()->city_id;
        $data['areas'] = Areas::where('city_id',$cityId)->get();
        $executiveAreas = EmployeeAreas::where('city_id',$cityId)->pluck('area_id')->toArray();
        $areas = Areas::select(['id', 'name'])->where("city_id", $cityId)->whereIn('id',$executiveAreas)->get();
        $data['assignedAreas'] = $areas;
      
        return view('Employee.manage',compact('data'));   
    }

    public function store(Request $request)
    {
        if ($request->hasFile('profile_image')) {
            $this->validate($request, [
                 'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $profPic = $request->file('profile_image');
            $profileImage = time().'.'.$profPic->getClientOriginalExtension();
            $destinationPath = public_path('/employeeprofilepic');
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
            $destinationPath = public_path('/employeegovementproff');
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
            $destinationPath = public_path('/employeePoliceproff');
            $PolicePic->move($destinationPath, $policeverificationProff);
        } else {
            $policeverificationProff ='';
        }


      
        $employee = new Employee();
        $employee->city_admin_id = Auth::user()->id;
        $employee->city_id = Auth::user()->city_id;
        $employee->name = $request->username;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->designation = $request->designation;
        $employee->mobile_number = $request->mobile_number;
        $employee->remarks = $request->remarks;
        $employee->profile_pic = $profileImage;
        $employee->goverment_proff = $govementProff;
        $employee->police_verification = $policeverificationProff;
        $employee->experience = $request->experience;
        $employee->save();
        

        $employeeId = $employee->id;
        foreach ($request->areas as $key => $area_id) {
            $userAreas = new EmployeeAreas();
            $userAreas->employee_id = $employeeId;
            $userAreas->city_id = Auth::user()->city_id;
            $userAreas->area_id = $area_id;
            $userAreas->save();
        }
        return redirect()->route('crews.index')->with('success','Employee Successfully Added');
    }

    public function show($id)
    {
        $data = [];
        $data['users'] = Employee::with(['areas.areas','category.category','category.subcategory'])->where('id',$id)->first();
        $data['page_title']="View Crew Member";
        return view('Employee.show',compact('data'));
    }

    public function edit(Request $request,$id)
    {
        $users = Employee::find($id);
        $data = [];
        $data['page_title']="edit Employee";
        $data['action']="edit"; 
        $data['user'] = $users;

         
        $cityId = Auth::user()->city_id;
        
        $data['areas'] = Areas::where('city_id',$cityId)->get();
        $data['executiveAreas'] = EmployeeAreas::where('city_id',$cityId)->pluck('area_id')->toArray();
        $executiveAreas = EmployeeAreas::where('city_id',$cityId)->pluck('area_id')->toArray();


        $areas = Areas::select(['id', 'name'])->where("city_id", $cityId)->whereIn('id',$executiveAreas)->get();
        $data['assignedAreas'] = $areas;
        
        
        return view('Employee.manage',compact('data'));
    }

    
    public function update(Request $request, $id)
    {   
        $user = Employee::find($id);
        if ($request->hasFile('profile_image')) {
            $this->validate($request, [
                 'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $destinationPath = public_path('/employeeprofilepic');
            File::delete($destinationPath.'/'.$user->profile_pic);
            
            $profPic = $request->file('profile_image');
            $profileImage = time().'.'.$profPic->getClientOriginalExtension();
            $destinationPath = public_path('/employeeprofilepic');
            $profPic->move($destinationPath, $profileImage);

        } else {
            $profileImage =$user->profile_pic;
        }

        if ($request->hasFile('govement_proff')) {
            $this->validate($request, [
                 'govement_proff' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $destinationPath = public_path('/employeegovementproff');
            File::delete($destinationPath.'/'.$user->govement_proff);
            $govPic = $request->file('govement_proff');
            $govementProff = time().'.'.$govPic->getClientOriginalExtension();
            $destinationPath = public_path('/employeegovementproff');
            $govPic->move($destinationPath, $govementProff);
        } else {
            $govementProff =$user->goverment_proff;
        }

        if ($request->hasFile('police_verification')) {
            $this->validate($request, [
                 'police_verification' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $destinationPath = public_path('/employeePoliceproff');
            File::delete($destinationPath.'/'.$user->police_verification);
            $PolicePic = $request->file('police_verification');
            $policeverificationProff = time().'.'.$PolicePic->getClientOriginalExtension();
            $destinationPath = public_path('/employeePoliceproff');
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

        EmployeeAreas::where('employee_id',$id)->delete();
        foreach ($request->areas as $key => $area_id) {
            $userAreas = new EmployeeAreas();
            $userAreas->employee_id =  $id;
            $userAreas->city_id = Auth::user()->city_id;
            $userAreas->area_id = $area_id;
            $userAreas->save();
        }
        $updateArray = ['name'=>$request->username,'email'=>$request->email,'password'=>$password,'designation'=>$request->designation,'mobile_number'=>$request->mobile_number,'profile_pic'=>$profileImage,'goverment_proff'=>$govementProff,'police_verification'=>$policeverificationProff,'experience'=>$request->experience];

        $result = Employee::where('id',$id)->update($updateArray);
        if($result==1){
            return redirect()->route('crews.index')->with('success','Employees Successfully Updated');
        } else{
            return redirect()->back()->with('success','Employees Successfully Updated');
        }
       
    }

     
    public function destroy($id)
    {
        EmployeeAreas::where('employee_id',$id)->delete();
        $user = Executive::find($id);

        $destinationPath = public_path('/employeeprofilepic');
        File::delete($destinationPath.'/'.$user->profile_pic);

        $destinationPathOne = public_path('/employeegovementproff');
        File::delete($destinationPathOne.'/'.$user->goverment_proff);

        $destinationPathOne = public_path('/employeePoliceproff');
        File::delete($destinationPathOne.'/'.$user->police_verification);
       
        $result = $user->delete();
        if($result==1){
            $message = 'Employe Successfully Deleted';
            return redirect()->route('crews.index')->with( [ 'success' => $message ] );
        } else {
            $message = 'Oops Something went wrong try again';
            return redirect()->route('crews.index')->with( [ 'error' => $message ] );
        }
    }

    public function assignEmployeesCategory($id)
    {
        $data = [];
        $data['page_title']="Assign Category";
        $data['category']=Category::pluck('category_name','id');
        $data['subcategory']=[];
        $data['employeeCategory'] = EmployeeCategories::with(['category','subcategory'])->get();
        return view('Employee.Category.index',compact('data'));
    }

    public function assignEmployeesCategoryStore(AssignCategoryRequest $request)
    {
        $matchExists = ['employee_id'=>$request->employee_id,'category_id'=>$request->category_id,'subcategory_id'=>$request->subcategory_id];

        $count = EmployeeCategories::where($matchExists)->count();
        if($count==0)
        {
            $employeeCategory = new EmployeeCategories();
            $employeeCategory->employee_id = $request->employee_id;
            $employeeCategory->category_id = $request->category_id;
            $employeeCategory->subcategory_id =$request->subcategory_id;
            $result = $employeeCategory->save();
            if($result==1){
                $message = 'Crew Member Category Successfully Assigned';
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

    public function employeeCategoryDelete($id)
    {
        $employeeCategory = EmployeeCategories::find($id);
        $result = $employeeCategory->delete();
        if($result==1){
            $message = 'Crew Member Category Successfully Deleted';
            return redirect()->back()->with( [ 'success' => $message ] );
        } else {
            $message = 'Oops Something went wrong try again';
            return redirect()->back()->with( [ 'error' => $message ] );
        }
    }
}
