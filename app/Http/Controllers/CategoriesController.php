<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use File;
use App\Models\Category;
use App\Models\Subcategory;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->page_data['page_title'] = 'Categories';
        
    }
    public function index()
    {
        $data = [];
        $data['page_title']="Categories Listing";
        $data['category']=Category::orderBy('id','desc')->get();
        return view('Categories.index',compact('data'));
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
        return view('Categories.manage',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if ($request->hasFile('category_image')) {
            $this->validate($request, [
                 'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $categoryPic = $request->file('category_image');
            $catImage = time().'.'.$categoryPic->getClientOriginalExtension();
            $destinationPath = public_path('/category');
            $categoryPic->move($destinationPath, $catImage);
        } else {
            $catImage ='';
        }
        
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->sorting_number = $request->sorting_number;
        $category->category_image = $catImage;
        $category->remarks = $request->remarks;
        $result = $category->save();
        if($result==1)
        {
            return redirect()->route('categories.index')->with('success','Category Successfully Added');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        } 


     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $category = Category::find($id);
        $data = [];
        $data['action']="edit";
        $data['page_title']="Edit Category";
        $data['category'] = $category;

        return view('Categories.manage',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);


        if ($request->hasFile('category_image')) {
            
            $destinationPath = public_path('/category');
            File::delete($destinationPath.'/'.$category->category_image);
            
            $this->validate($request, [
                 'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $categoryPic = $request->file('category_image');
            $catImage = time().'.'.$categoryPic->getClientOriginalExtension();
            $destinationPath = public_path('/category');
            $categoryPic->move($destinationPath, $catImage);

        } else {
            $catImage =$category->category_image;
        }

        $updateArray = [
                'category_name'=> $request->category_name,
                'sorting_number' => $request->sorting_number,
                'category_image' => $catImage,
                'remarks'=>$request->remarks
            ];
        
        $result = Category::where('id',$id)->update($updateArray);
        
        if($result==1)
        {
            return redirect()->route('categories.index')->with('success','Category Successfully Update');
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
            //check any subcategory exsists for these category

            $subcategory = Subcategory::where('category_id',$id)->get()->count();
            if($subcategory>0)
            {
                $message = 'Subcategories Exists for these categories Delete all subcategory & try again';
                    return redirect()->route('categories.index')->with( [ 'error' => $message ] );
            }   else {
                $category = Category::find($id);
                
                $destinationPath = public_path('/category');
                File::delete($destinationPath.'/'.$category->category_image);


                $result = $category->delete();
                if($result==1){
                    $message = 'Category Successfully Deleted';
                    return redirect()->route('categories.index')->with( [ 'success' => $message ] );
                } else {
                    $message = 'Oops Something went wrong try again';
                    return redirect()->route('categories.index')->with( [ 'error' => $message ] );
                }
            } 


            
         } catch (Exception $e) {
            
         }
     
    }
}
