<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   


        $id = $this->request->get('id') ?  $this->request->get('id') : '';
        
        if($id!=""){
           return [
               'email'=>'required|unique:users,email,'.$id.',id,deleted_at,NULL',
                'name' => 'required',
                'password'=>'required|min:8',
                'confirm_password'=>'required|same:password'
            ]; 
        } else {
           return [
               'email'=>'required|unique:users,email'.$id,
               'name' => 'required',
               'password'=>'required|min:8',
                'confirm_password'=>'required|same:password'
            ];
        } 
      
    }

    public function messages() {
        return [
            'email.required'  => 'Email Address is mandatory',
            'name.required' => 'Name is mandatory',
            'password.required' => 'Password  is mandatory',
            'confirm_password.required' => 'Confirm Password  is mandatory'

            
        ];
    }
}
