<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\States;
use File;
class CityController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        
        $this->page_data['page_title'] = 'Cities';
        
    }


    public function index()
    {
        $data = [];
        $data['page_title']="Cities Listing";
        $data['cities']=Cities::orderBy('id','desc')->get();

        return view('Cities.index',compact('data'));
    }

     
    public function create()
    {
        $data = [];
        $data['page_title']="City create";
        $data['action']='create';
        $data['state']=States::pluck('name','id');
        $data['selectedState']='';
        return view('Cities.manage',compact('data'));
    }

     
    public function store(Request $request)
    {
        if ($request->hasFile('city_image')) {

            $this->validate($request, [
                 'city_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $cityPic = $request->file('city_image');
            $cityImage = time().'.'.$cityPic->getClientOriginalExtension();
            $destinationPath = public_path('/cities');
            $cityPic->move($destinationPath, $cityImage);
        } else {
            $cityImage ='';
        }
        
        $city = new Cities();
        $city->name = $request->name;
        $city->state_id = $request->state_id;
        $city->city_image = $cityImage;
         
        $result = $city->save();
        if($result==1)
        {
            return redirect()->route('cities.index')->with('success','City Successfully Added');
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
        $city = Cities::find($id);
        $data = [];
        $data['action']="edit";
        $data['page_title']="Edit City";
        $data['cities'] = $city;
         $data['state']=States::pluck('name','id');
        $data['selectedState']=$city->state_id;
        return view('Cities.manage',compact('data'));
    }

     
    public function update(Request $request, $id)
    {
        $city = Cities::find($id);


        if ($request->hasFile('city_image')) {

            $destinationPath = public_path('/subcategory');
            File::delete($destinationPath.'/'.$city->city_image);


            $this->validate($request, [
                 'city_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $cityPic = $request->file('city_image');
            $cityImage = time().'.'.$cityPic->getClientOriginalExtension();
            $destinationPath = public_path('/cities');
            $cityPic->move($destinationPath, $cityImage);
        } else {
            $cityImage =$city->city_image;
        }

        $updateArray = [
                'name'=> $request->name,
                'state_id' => $request->state_id,
                'city_image' => $cityImage
                
            ];
        
        $result = Cities::where('id',$id)->update($updateArray);
        
        if($result==1)
        {
            return redirect()->route('cities.index')->with('success','City Successfully Update');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        } 
    }

     
    public function destroy($id)
    {
            
                $city = Cities::find($id);
                $destinationPath = public_path('/cities');
                File::delete($destinationPath.'/'.$city->city_image);

                $result = $city->delete();
                if($result==1){
                    $message = 'City Successfully Deleted';
                    return redirect()->route('cities.index')->with( [ 'success' => $message ] );
                } else {
                    $message = 'Oops Something went wrong try again';
                    return redirect()->route('cities.index')->with( [ 'error' => $message ] );
                }
             
    }
}
