<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsLatter;
class NewsLatterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data = [];
        $data['page_title']="Newslatter Listing";
        $data['newslatter']=NewsLatter::orderBy('id','desc')->get();
        return view('NewsLatter.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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

            $subcategory = Newslatter::find($id);
            $result = $subcategory->delete();
            if($result==1){
                $message = 'Newslatter Successfully Deleted';
                return redirect()->route('newslatter.index')->with( [ 'success' => $message ] );
            } else {
                $message = 'Oops Something went wrong try again';
                return redirect()->route('newslatter.index')->with( [ 'error' => $message ] );
            }
        } catch (Exception $e) {
            
        }
    }
}
