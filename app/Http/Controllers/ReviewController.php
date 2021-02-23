<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerReviews;
use Response;
class ReviewController extends Controller
{
    public function index(Request $request)
    {
    	$data = [];
    	$data['page_title']="Customer Reviews";
    	$data['reviews'] = CustomerReviews::with('individualUser','childcategory')->orderBy('id','desc')->get();
    	return view('Reviews.index',compact('data'));
    }


    public function approve(Request $request)
    {
        //dd($request->all());

        $id= $request->id;
        $status = $request->status;
        $result = CustomerReviews::where('id',$id)->update(['approved'=>$status]);

        if($result==1){
            return Response::json(["status"=>"success","message"=>"Reivews Status Updated"]);
        } else {
            return Response::json(["status"=>"error","message"=>"Oops Something Went Wrong Try Again"]);
        }

    }

    public function destroy($id)
    {
    	try {
            //check any subcategory exsists for these category
            $banner = CustomerReviews::find($id);
            
            $result = $banner->delete();
            if($result==1){
                $message = 'Review Successfully Deleted';
                return redirect()->route('reviews.index')->with( [ 'success' => $message ] );
            } else {
                $message = 'Oops Something went wrong try again';
                return redirect()->route('reviews.index')->with( [ 'error' => $message ] );
            }
        } catch (Exception $e) {
            
        }
    }

}
