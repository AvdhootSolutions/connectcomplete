<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {   

        $id = $this->request->get('id') ?  $this->request->get('id') : '';
         
         
        if($id!=""){
             
           return [
               'category_name'=>'required|unique:tbl_categories,category_name,'.$id.',id,deleted_at,NULL',
                'sorting_number' => 'required'
            ]; 
        } else {

           return [
                
               'category_name'=>'required|unique:tbl_categories,category_name'.$id,
               'sorting_number' => 'required' 
            ];

        } 





         
    }

    public function messages() {

        return [
             
            'category_name.required'  => 'Category name is mandatory',
            'sorting_number.required' => 'Sorting Number is mandatory' 
             

            
        ];
    }
}
