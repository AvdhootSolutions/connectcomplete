<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FeaturedImages;
use File;
class FeaturedImagesController extends Controller
{
     
    public function index()
    {
        //
        $data = [];
        $data['page_title']="Featured Images Management";
        $data['featuredimages'] = FeaturedImages::orderBy('id','desc')->get();
        return view('FeaturedImage.index',compact('data'));
    }

     
    public function create()
    {
         $data = [];
        $data['page_title']="Create Featured Image";
        $data['action']="create";
        return view('FeaturedImage.manage',compact('data'));
    }

     
    public function store(Request $request)
    {
        $featuredImage='';
        if ($request->hasFile('featured_image')) {
            $this->validate($request, [
                 'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $featuredPic = $request->file('featured_image');
            $featuredImage = time().'.'.$featuredPic->getClientOriginalExtension();
            $destinationPath = public_path('/featuredImage');
            $featuredPic->move($destinationPath, $featuredImage);
        } else {
            $featuredImage ='';
        }


        $featuredImg = new FeaturedImages();
        $featuredImg->featured_image = $featuredImage;
        $featuredImg->is_featured = $request->is_featured;
        $result = $featuredImg->save();


        if($result==1)
        {
            return redirect()->route('featuredimages.index')->with('success','Featured Image Successfully Added');
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
        $featuredImages = FeaturedImages::find($id);
        $data = [];
        $data['page_title']="Featured Image Edit";
        $data['action']='edit';
        $data['featuredimages']= $featuredImages;
        return view('FeaturedImage.manage',compact('data'));
    }

    
    public function update(Request $request, $id)
    {
       $featuredImages = FeaturedImages::find($id);

        $featuredImg ='';
        if ($request->hasFile('featured_image')) {
            $destinationPath = public_path('/featuredImage');
            File::delete($destinationPath.'/'.$featuredImages->featured_image);
            $this->validate($request, [
                 'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $featuredPic = $request->file('featured_image');
            $featuredImg = time().'.'.$featuredPic->getClientOriginalExtension();
            $destinationPath = public_path('/featuredImage');
            $featuredPic->move($destinationPath, $featuredImg);
        } else {
            $featuredImg =$featuredImages->featured_image;
        }



        $updateArray = [
            'featured_image'=>$featuredImg,
            'is_featured'=>$request->is_featured
                        ];

        $result =  FeaturedImages::where('id',$id)->update($updateArray);                 

        if($result==1)
        {
            return redirect()->route('featuredimages.index')->with('success','Featured Image Successfully Update');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        }

    }

     
    public function destroy($id)
    {
        try {
            //check any subcategory exsists for these category
            $featured = FeaturedImages::find($id);
            $destinationPath = public_path('/featuredImage');
            File::delete($destinationPath.'/'.$featured->featured_image);
            $result = $featured->delete();
            if($result==1){
                $message = 'Featured Image Successfully Deleted';
                return redirect()->route('featuredimages.index')->with( [ 'success' => $message ] );
            } else {
                $message = 'Oops Something went wrong try again';
                return redirect()->route('featuredimages.index')->with( [ 'error' => $message ] );
            }
        } catch (Exception $e) {
            
        }
    }
}
