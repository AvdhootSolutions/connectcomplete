<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssignCityCategory;
use App\Models\ChildCategory;
use App\Models\States;
use App\Models\Cities;
use App\Models\Areas;
use Session;
class Helper
{
	public static function getExistsIncity($id)
    {	
    	if (\session('cityId') > 0) {
            $cityId = \session('cityId');
        }else{
            $cityId = 0; 
        }


       $matchCase = ['category_id'=>$id,'city_id'=>$cityId];
         
    	$checkAssign = AssignCityCategory::where($matchCase)->get();
    	
		if(count($checkAssign))
		{
		 	return true;
		} else {
		 	return false;
		}

        
    }

     public static function getCartData()
    {
        try {
            $response_data = [];
            

            if(count(session()->get('cart'))>0)
            { 

                $content = session()->get('cart');


                $product_list = [];
                foreach($content AS $record) {
                     
                    $id = $record['id'];
                    
                    $product = ChildCategory::where('id', '=', $id)->first();

                    $product_list[$id] = [ 'id'=>$id ,'category_name' => $product->child_category_name, 'child_category_image'=>$product->child_category_image,'cart_quantity' => count($content) ,'price'=>$record['price']];
                    
                }
                 
                ksort($product_list);
                $response_data['product_list']   = $product_list;
            }    

            return $response_data;
        } catch (\Exception $e) {
            $data = [ 'product_list' => [] ];

            return $data;
        }
    }

    public static function getState($id)
    {
        $state = States::find($id);
        return $state->name;
    }
    public static function getCity($id)
    {
        $city = Cities::find($id);
        return $city->name;
    }
    public static function getArea($id)
    {
        $areas = Areas::find($id);
        return $areas->name;
    }
}