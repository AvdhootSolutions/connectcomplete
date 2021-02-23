<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChildcategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use App\Models\ChildCategoryImages;
use File;
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
        $childcategory->is_featured=$request->is_featured;
        $childcategory->is_trending=$request->is_trending;
        $childcategory->actual_price=$request->actual_price;
        $childcategory->tag_percentage=$request->tag_percentage;
        $childcategory->short_description=$request->short_description;
        $childcategory->long_description=$request->long_description;








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
                'is_featured'=>$request->is_featured,
                'is_trending'=>$request->is_trending,
                'actual_price'=>$request->actual_price,
                'tag_percentage'=>$request->tag_percentage,
                'short_description'=>$request->short_description,
                'long_description'=>$request->long_description
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


    public function gallery($id)
    {
        $data = [];
        $data['id'] = $id;
        $data['productImages'] = ChildCategoryImages::where('child_category_id',$id)->get();
         
        return view('Childcategories.gallery',compact('data'));
    }

    public function addgallery($id)
    {   
        $data = [];
        $data['id'] = $id;
        $data['productImages'] = ChildCategoryImages::where('child_category_id',$id)->get();
         
        return view('Childcategories.uploadGallery',compact('data'));

    }

     public function storegallery(Request $request)
    {
        $child_category_id = $request->child_category_id;

        $getcount = ChildCategoryImages::where('child_category_id',$child_category_id)->get()->count();

        $totalLimit =50;
        $remainingLimit = $totalLimit- $getcount;

        $hiddenImage = $request->hiddenImage;
        $checkDeleted = $request->hiddenDeletedImage;
        if(count($request->product_image)<=$remainingLimit){
                //If Previous Images Deleted
                if($checkDeleted!=""){
                    $stringData = rtrim($request->hiddenDeletedImage,',');
                    $explode = explode(",",$stringData);
                    foreach ($explode  as  $value) {
                        
                        $usersImage = public_path("uploads/").$value;
                        if (File::exists($usersImage)) { 
                            unlink($usersImage);
                        } 
                    }
                }
                
                if ($request->hasFile('product_image')) {

                        $image=array();
                        if($files=$request->file('product_image')){
                            
                            foreach($files as $productImage){
                                $file = $productImage;
                                $productImage = time().$file->getClientOriginalName();
                                $destinationPath = public_path('/uploads');
                                $file->move($destinationPath, $productImage);
                                $image[]=$productImage;

                            }

                        }

                        $implodeString = implode(",",$image);
                        $newArray = $hiddenImage.','.$implodeString;
                        if( $newArray[0] === ',' ) {
                               $newArray = substr($newArray,1);
                        }

                } else {
                        $newArray =$hiddenImage;
                } 


                $imagesArray = explode(",", $newArray);
                $productsImages = ChildCategoryImages::where("child_category_id",$child_category_id)->get(['id']);   
                ChildCategoryImages::destroy($productsImages->toArray());

                for($i=0;$i<count($imagesArray);$i++){
                    $productImage = new ChildCategoryImages();
                    $productImage->child_category_id=$child_category_id;
                     
                    $productImage->image=$imagesArray[$i];
                    
                    $productImage->save();
                }
                   
                $message = 'Gallery Images Successfully Uploaded';
                return redirect()->route('childcategories.gallery',$child_category_id)->with( [ 'success' => $message ] );
        }
        else {
            $message = 'You can Upload only 50 total Image..Try again with less images';
                return redirect()->route('childcategories.addgallery',$child_category_id)->with( [ 'error' => $message ] );
        }


    }

     public function deletegallery($id)
    {
        //dd($id);
        $childCategoryImages = ChildCategoryImages::find($id);
        $usersImage = public_path("uploads/").$childCategoryImages->image;
        
        if (File::exists($usersImage)) { 
            //dd($usersImage);
                    unlink($usersImage);
        }
        $result = $childCategoryImages->delete();
        if($result==1){
                $message = 'Image Successfully Added';
                return redirect()->back()->with( [ 'success' => $message ] );
            } else {
                $message = 'Oops Something went wrong try again';
                return redirect()->back()->with( [ 'error' => $message ] );
        }

    }
}
