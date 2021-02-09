<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class AssignCategoryRequest extends FormRequest
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

         

           return [
                
               'category_id'=>'required',
               'subcategory_id' => 'required' 
            ];

       




         
    }

    public function messages() {

        return [
             
            'category_id.required'  => 'Category  is mandatory',
            'subcategory_id.required' => 'Subcategory is mandatory' 
             

            
        ];
    }
}
