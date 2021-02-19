<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banners;
use File;
class BannerController extends Controller
{
     
    public function index()
    {
        $data = [];
        $data['page_title']="Banner Management";
        $data['banners'] = Banners::orderBy('id','desc')->get();
        return view('Banners.index',compact('data'));
    }

     
    public function create()
    {
        $data = [];
        $data['page_title']="Create Banner";
        $data['action']="create";
        return view('Banners.manage',compact('data'));
    }

     
    public function store(Request $request)
    {   
        $bannerImage='';
        if ($request->hasFile('banner_image')) {
            $this->validate($request, [
                 'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $bannersPic = $request->file('banner_image');
            $bannerImage = time().'.'.$bannersPic->getClientOriginalExtension();
            $destinationPath = public_path('/banners');
            $bannersPic->move($destinationPath, $bannerImage);
        } else {
            $bannerImage ='';
        }


        $banner = new Banners();
        $banner->banner_image = $bannerImage;
        $banner->is_featured = $request->is_featured;
        $result = $banner->save();


        if($result==1)
        {
            return redirect()->route('banners.index')->with('success','Banner Image Successfully Added');
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
        $banners = Banners::find($id);
        $data = [];
        $data['page_title']="Child Category Edit";
        $data['action']='edit';
        $data['banners']= $banners;
        return view('Banners.manage',compact('data'));
    }

     
    public function update(Request $request, $id)
    {
        $banners = Banners::find($id);

        $bannerImage ='';
        if ($request->hasFile('banner_image')) {
            $destinationPath = public_path('/banners');
            File::delete($destinationPath.'/'.$banners->banner_image);
            $this->validate($request, [
                 'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $bannersPic = $request->file('banner_image');
            $bannerImage = time().'.'.$bannersPic->getClientOriginalExtension();
            $destinationPath = public_path('/banners');
            $bannersPic->move($destinationPath, $bannerImage);
        } else {
            $bannerImage =$banners->banner_image;
        }



        $updateArray = [
            'banner_image'=>$bannerImage,
            'is_featured'=>$request->is_featured
                        ];

        $result =  Banners::where('id',$id)->update($updateArray);                 

        if($result==1)
        {
            return redirect()->route('banners.index')->with('success','Banner Successfully Update');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        }



    }

     
    public function destroy($id)
    {
        try {
            //check any subcategory exsists for these category
            $banner = Banners::find($id);
            $destinationPath = public_path('/banners');
            File::delete($destinationPath.'/'.$banner->banner_image);
            $result = $banner->delete();
            if($result==1){
                $message = 'Banner Image Successfully Deleted';
                return redirect()->route('banners.index')->with( [ 'success' => $message ] );
            } else {
                $message = 'Oops Something went wrong try again';
                return redirect()->route('banners.index')->with( [ 'error' => $message ] );
            }
        } catch (Exception $e) {
            
        }
    }
}
