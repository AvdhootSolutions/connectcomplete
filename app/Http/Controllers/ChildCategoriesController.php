<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChildcategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;

class ChildCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->page_data['page_title'] = 'Categories';
        
    }
    
    public function getSubCategory(Request $request)
    {
    
        $cat_id = (int) $request->category_id;
        if ($cat_id > 0) {
            $subcategory = Subcategory::select(['id', 'subcategory_name'])
                            ->where("category_id", $cat_id)
                            ->orderBy('subcategory_name')
                            ->get();
        
            return response()->json(array('status' => 'success', 'data' => $subcategory));
        }
        return response()->json(array('status' => 'error', 'data' => 'invalid request'));
    } 

     public function getChildCategory(Request $request)
    {
       
        $subcategory_id = (int) $request->subcategory_id;
        if ($subcategory_id > 0) {
            $childcategory = ChildCategory::select(['id', 'child_category_name'])
                            ->where("subcategory_id", $subcategory_id)
                            ->orderBy('child_category_name')
                            ->get();
        
            return response()->json(array('status' => 'success', 'data' => $childcategory));
        }
        return response()->json(array('status' => 'error', 'data' => 'invalid request'));
    } 
    public function index()
    {
        $data = [];
        $data['page_title']="Child Categories Listing";
        $data['childcategory']=ChildCategory::with(['category','subcategory'])->orderBy('id','desc')->get();
        return view('Childcategories.index',compact('data'));
    }

     
    public function create()
    {
        $data = [];
        $data['page_title']="Child Category create";
        $data['action']='create';
        $data['category']=Category::pluck('category_name','id');
        $data['selectedCategory']='';
        $data['subcategory']=[];
        $data['selectedSubCategory']='';
        return view('Childcategories.manage',compact('data'));
    }

     
    public function store(ChildcategoryRequest $request)
    {

        if ($request->hasFile('child_category_image')) {
            $this->validate($request, [
                 'child_category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $childcategoryPic = $request->file('child_category_image');
            $childcatImage = time().'.'.$childcategoryPic->getClientOriginalExtension();
            $destinationPath = public_path('/childcategory');
            $childcategoryPic->move($destinationPath, $childcatImage);
        } else {
            $childcatImage ='';
        }
        
        $minimum_cost=0;    
        $service_cost=0;    
        if($request->working_stage==1)
        {
            $minimum_cost = $request->minimum_cost;
        }
        if($request->working_stage==0)
        {
            $service_cost = $request->service_cost;
        }



        $childcategory = new ChildCategory();
        $childcategory->child_category_name = $request->child_category_name;
        $childcategory->sorting_number = $request->sorting_number;
        $childcategory->category_id = $request->category_id;
        $childcategory->subcategory_id = $request->subcategory_id;
        $childcategory->price = $request->price;
        $childcategory->child_category_image = $childcatImage;
        $childcategory->remarks=$request->remarks;
        $childcategory->working_stage=$request->working_stage;
        $childcategory->minimum_cost=$minimum_cost;
        $childcategory->service_cost=$service_cost;
        $result = $childcategory->save();


        if($result==1)
        {
            return redirect()->route('childcategories.index')->with('success','Child Category Successfully Added');
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
        $childcategory = ChildCategory::find($id);
        $data = [];
        $data['page_title']="Child Category Edit";
        $data['action']='edit';
        $data['category']=Category::pluck('category_name','id');
        $data['selectedCategory']=$childcategory->category_id;
        $data['subcategory']=Subcategory::pluck('subcategory_name','id');
        $data['selectedSubCategory']=$childcategory->subcategory_id;
        $data['childcategory']=$childcategory;
        return view('Childcategories.manage',compact('data'));
    }

     
    public function update(ChildcategoryRequest $request, $id)
    {
        $childcategory = ChildCategory::find($id);
        if ($request->hasFile('child_category_image')) {


            $destinationPath = public_path('/childcategory');
            File::delete($destinationPath.'/'.$childcategory->child_category_image);


            $this->validate($request, [
                 'child_category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $childcategoryPic = $request->file('child_category_image');
            $childcatImage = time().'.'.$childcategoryPic->getClientOriginalExtension();
            $destinationPath = public_path('/childcategory');
            $childcategoryPic->move($destinationPath, $childcatImage);
        } else {
            $childcatImage =$childcategory->child_category_image;
        }


        $minimum_cost=0;    
        $service_cost=0;    
        if($request->working_stage==1)
        {
            $minimum_cost = $request->minimum_cost;
        }
        if($request->working_stage==0)
        {
            $service_cost = $request->service_cost;
        }


        $updateArray = [
                'child_category_name'=> $request->child_category_name,
                'sorting_number' => $request->sorting_number,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'price' => $request->price,
                'child_category_image' => $childcatImage,
                'remarks'=>$request->remarks,
                'working_stage'=>$request->working_stage,
                'minimum_cost'=>$minimum_cost,
                'service_cost'=>$service_cost,
            ];
        
        $result = ChildCategory::where('id',$id)->update($updateArray);
       
        if($result==1)
        {
            return redirect()->route('childcategories.index')->with('success','Child Category Successfully Update');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        } 
    }

     
    public function destroy($id)
    {
        try {
            //check any subcategory exsists for these category
            $childcategory = ChildCategory::find($id);
            $destinationPath = public_path('/childcategory');
            File::delete($destinationPath.'/'.$childcategory->child_category_image);
            $result = $childcategory->delete();
            if($result==1){
                $message = 'Child Category Successfully Deleted';
                return redirect()->route('childcategories.index')->with( [ 'success' => $message ] );
            } else {
                $message = 'Oops Something went wrong try again';
                return redirect()->route('childcategories.index')->with( [ 'error' => $message ] );
            }
        } catch (Exception $e) {
            
        }
    }
}
