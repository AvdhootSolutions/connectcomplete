<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageContent;
class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [];
        $data['page_title']="Page Contents";
        $data['pages']=PageContent::orderby('id','desc')->get();
        return view('Pages.index',compact('data'));
    }

     
    public function create()
    {
        $data = [];
        $data['page_title']="Page Contents";
        $data['action']="create";
        //$data['pages']=PageContent::orderby('id','desc')->get();
        return view('Pages.manage',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pagecontent = new PageContent();
        $pagecontent->page = $request->page;
        $pagecontent->slug = $request->slug;
        $pagecontent->contents = $request->contents;
        $result = $pagecontent->save();
        if($result==1)
        {
            return redirect()->route('pagecontent.index')->with('success','Page Successfully Added');
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
        $pagecontent = PageContent::find($id);
        $data = [];
        $data['page_title']="Page Contents";
        $data['action']="edit";
        $data['pagecontent']=$pagecontent;
        return view('Pages.manage',compact('data')); 
    }

    
    public function update(Request $request, $id)
    {
        
        $updateArray =['page'=>$request->page,'slug'=>$request->slug,'contents'=>$request->contents];

        $result = PageContent::where('id',$id)->update($updateArray);
        if($result==1)
        {
            return redirect()->route('pagecontent.index')->with('success','Page Updated Successfully');
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
