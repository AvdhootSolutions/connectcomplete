<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\AssignCityCategory;
class AssignCategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function assignCitiyCategory(Request $request,$id)
    { 
    	$data = [];
    	$data['category'] = Category::orderBy('id','desc')->pluck('category_name','id');
    	$data['citycategory']=AssignCityCategory::with(['cities','category'])->where('city_id',$id)->get();
    	return view('Cities.assignCategory',compact('data'));
    }

    public function store(Request $request)
    {

    	//Check Already Assign or not
    	$matchcase = ['city_id'=>$request->city_id,'category_id'=>$request->category_id];
    	$assignCount = AssignCityCategory::where($matchcase)->count();
        
    	if($assignCount==0)
    	{
	    	$assignCityCategory = new AssignCityCategory();
	    	$assignCityCategory->city_id = $request->city_id;
	    	$assignCityCategory->category_id = $request->category_id;
	    	$result = $assignCityCategory->save();	
	    	if($result==1)
	    	{
	    		return redirect()->back()->with('success','Category assigned as per city');
	    	} else {
	    		return redirect()->back()->with('error','Oops Something went wrong try again');
	    	}
    	}

    }

    public function delete($id)
    {
    	$assigncitycategory = AssignCityCategory::find($id);
    	$result = $assigncitycategory->delete();
		if($result==1)
    	{
    		return redirect()->back()->with('success','Category Successfully Removed');
    	} else {
    		return redirect()->back()->with('error','Oops Something went wrong try again');
    	}
    }
}
