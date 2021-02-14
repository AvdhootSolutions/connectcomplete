<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blogs;
class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data= [];
        $data['page_title']="Blogs";
        $data['blogs'] = Blogs::orderBy('id','desc')->get();
        return view('Blogs.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data= [];
        $data['page_title']="Blogs";
        $data['action']="create";
        return view('Blogs.manage',compact('data'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         

        $blogImage = '';
        if($request->media_type==1)
        {

            if ($request->hasFile('blog_image')) {
            $this->validate($request, [
                 'blog_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $categoryPic = $request->file('blog_image');
            $blogImage = time().'.'.$categoryPic->getClientOriginalExtension();
            $destinationPath = public_path('/blogs');
            $categoryPic->move($destinationPath, $blogImage);
            } else {
                $blogImage ='';
            }
        } 

        $videoUrl ='';
        if($request->media_type==2)
        {
            $videoUrl= $request->video_url;
        } else{
            $videoUrl='';
        }


        $blogs = new Blogs();
        $blogs->title = $request->title;
        $blogs->author = $request->author;
        $blogs->description = $request->description;
        $blogs->media_type = $request->media_type;
        $blogs->blog_image = $blogImage;
        $blogs->video_url = $videoUrl;
        $result = $blogs->save();

        if($result==1)
        {
            return redirect()->route('blogs.index')->with('success','Blog Created Successfully');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        }


    }

     
    public function show($id)
    {   $data = [];
        $data['page_title']="View Blog";
        $data['blogs'] = Blogs::find($id);
        return view('Blogs.show',compact('data'));
    }

     
    public function edit($id)
    {
        $data =[];
        $data['page_title']="Edit Blog";
        $data['action']="edit";
        $data['blogs']=Blogs::find($id);
        return view('Blogs.manage',compact('data'));
    }

    
    public function update(Request $request, $id)
    {   $blogImage = '';
        $videoUrl='';
        $blogs = Blogs::find($id);
        if($request->media_type==1)
        {

            if ($request->hasFile('blog_image')) {
            $this->validate($request, [
                 'blog_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $categoryPic = $request->file('blog_image');
            $blogImage = time().'.'.$categoryPic->getClientOriginalExtension();
            $destinationPath = public_path('/blogs');
            $categoryPic->move($destinationPath, $blogImage);
            } else {
                $blogImage =$blogs->blog_image;
            }
        } 

        $videoUrl ='';
        if($request->media_type==2)
        {
            $videoUrl= $request->video_url;
        } else{
            $videoUrl=$blogs->video_url;
        }

        $updateArray = ['title'=>$request->title,'author'=>$request->author,'description'=>$request->description,'media_type'=>$request->media_type,'blog_image'=>$blogImage,'video_url'=> $videoUrl];

       $result = Blogs::where('id',$id)->update($updateArray);  

        if($result==1)
        {
            return redirect()->route('blogs.index')->with('success','Blog Successfully Updated');
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
        //
    }
}
