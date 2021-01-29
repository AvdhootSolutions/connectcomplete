<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
               'subcategory_name'=>'required|unique:tbl_subcategories,subcategory_name,'.$id.',id,deleted_at,NULL',
                'sorting_number' => 'required',
                'category_id'=>'required'
            ]; 
        } else {

           return [
                
               'subcategory_name'=>'required|unique:tbl_subcategories,subcategory_name'.$id,
               'sorting_number' => 'required',
               'category_id'=>'required' 
            ];

        } 






        
    }

    public function messages() {

        return [
             
            'subcategory_name.required'  => 'Subcategory name is mandatory',
            'sorting_number.required' => 'Sorting Number is mandatory',
            'category_id.required' => 'Category  is mandatory'

            
        ];
    }
}
