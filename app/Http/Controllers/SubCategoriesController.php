<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use App\Http\Requests\SubCategoryRequest;

class SubCategoriesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        $this->page_data['page_title'] = 'Subcategories';
        
    }
    public function index()
    {
        $data = [];
        $data['page_title']="Subcategories Listing";
        $data['subcategory']=Subcategory::orderBy('id','desc')->get();
        return view('SubCategories.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = [];
        $data['page_title']="Category create";
        $data['action']='create';
        $data['category']=Category::pluck('category_name','id');
        $data['selectedCategory']='';
        return view('SubCategories.manage',compact('data'));
    }

     
    public function store(SubCategoryRequest $request)
    {
        if ($request->hasFile('subcategory_image')) {

            $this->validate($request, [
                 'subcategory_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $categoryPic = $request->file('subcategory_image');
            $subcatImage = time().'.'.$categoryPic->getClientOriginalExtension();
            $destinationPath = public_path('/subcategory');
            $categoryPic->move($destinationPath, $subcatImage);
        } else {
            $subcatImage ='';
        }
        
        $subcategory = new Subcategory();
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->sorting_number = $request->sorting_number;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_image = $subcatImage;
        $subcategory->remarks=$request->remarks;
        $result = $subcategory->save();
        if($result==1)
        {
            return redirect()->route('subcategories.index')->with('success','Subcategory Successfully Added');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        } 
    }

     
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
        $subcategory = Subcategory::find($id);
        $data = [];
        $data['action']="edit";
        $data['page_title']="Edit Subcategory";
        $data['subcategory'] = $subcategory;
         $data['category']=Category::pluck('category_name','id');
        $data['selectedCategory']=$subcategory->category_id;
        return view('SubCategories.manage',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryRequest $request, $id)
    {
         $subcategory = Subcategory::find($id);


        if ($request->hasFile('subcategory_image')) {

            $destinationPath = public_path('/subcategory');
            File::delete($destinationPath.'/'.$subcategory->subcategory_image);


            $this->validate($request, [
                 'subcategory_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $categoryPic = $request->file('subcategory_image');
            $subcatImage = time().'.'.$categoryPic->getClientOriginalExtension();
            $destinationPath = public_path('/subcategory');
            $categoryPic->move($destinationPath, $subcatImage);
        } else {
            $subcatImage =$subcategory->subcategory_image;
        }

        $updateArray = [
                'subcategory_name'=> $request->subcategory_name,
                'sorting_number' => $request->sorting_number,
                'category_id' => $request->category_id,
                'subcategory_image' => $subcatImage,
                'remarks'=>$request->remarks
            ];
        
        $result = Subcategory::where('id',$id)->update($updateArray);
        
        if($result==1)
        {
            return redirect()->route('subcategories.index')->with('success','SubCategory Successfully Update');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //check any childcategory exsists for these subcategory

            $subcategory = ChildCategory::where('subcategory_id',$id)->get()->count();
            if($subcategory>0)
            {
                $message = 'Subcategories Exists for these Child Categories Delete all Child Category & try again';
                    return redirect()->route('subcategories.index')->with( [ 'error' => $message ] );
            }   else {

                $subcategory = Subcategory::find($id);
                $destinationPath = public_path('/subcategory');
                File::delete($destinationPath.'/'.$subcategory->subcategory_image);

                $result = $subcategory->delete();
                if($result==1){
                    $message = 'Subcategory Successfully Deleted';
                    return redirect()->route('subcategories.index')->with( [ 'success' => $message ] );
                } else {
                    $message = 'Oops Something went wrong try again';
                    return redirect()->route('subcategories.index')->with( [ 'error' => $message ] );
                }
            } 
            
        } catch (Exception $e) {
            
        }
    }
}
