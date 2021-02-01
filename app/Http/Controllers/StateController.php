<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\States;
use App\Models\Cities;
use File;
class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->page_data['page_title'] = 'Cities';
        
    }

    public function index()
    {
        $data = [];
        $data['page_title']="States Listing";
        $data['states']=States::orderBy('id','desc')->get();
        return view('States.index',compact('data'));
    }

     
    public function create()
    {
        $data = [];
        $data['page_title']="States create";
        $data['action']='create';
        return view('States.manage',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $state = new States();
        $state->name = $request->name;
        $result = $state->save();
        if($result==1)
        {
            return redirect()->route('states.index')->with('success','State Successfully Added');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        } 
    }

    
    public function show($id)
    {
        
    }

     
    public function edit($id)
    {
         $states = States::find($id);
        $data = [];
        $data['action']="edit";
        $data['page_title']="Edit State";
        $data['states'] = $states;

        return view('States.manage',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = States::find($id);
        $updateArray = [
                'name'=> $request->name
            ];
        
        $result = States::where('id',$id)->update($updateArray);
        
        if($result==1)
        {
            return redirect()->route('states.index')->with('success','State Successfully Update');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        } 
    }

     
    public function destroy($id)
    {
        $states = States::find($id);
        $result = $states->delete();
        if($result==1){
            $message = 'State Successfully Deleted';
            return redirect()->route('states.index')->with( [ 'success' => $message ] );
        } else {
            $message = 'Oops Something went wrong try again';
            return redirect()->route('states.index')->with( [ 'error' => $message ] );
        }
    }
}
