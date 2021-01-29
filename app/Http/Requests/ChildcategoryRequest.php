<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChildcategoryRequest extends FormRequest
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
               'child_category_name'=>'required|unique:tbl_child_category,child_category_name,'.$id.',id,deleted_at,NULL',
                'category_id' => 'required',
                'subcategory_id' => 'required',
            ]; 
        } else {

           return [
                
                'child_category_name'=>'required|unique:tbl_child_category,child_category_name'.$id,
                'sorting_number' => 'required',
                'category_id' => 'required',
                'subcategory_id' => 'required',
            ];

        } 



         
    }

    public function messages() {

        return [
             
            'child_category_name.required'  => 'Child Category Name is mandatory',
            'category_id.required'  => 'Category is mandatory',
            'subcategory_id.required'  => 'Subcategory is mandatory',
            'sorting_number.required' => 'Sorting Number is mandatory' 
             

            
        ];
    }
}
