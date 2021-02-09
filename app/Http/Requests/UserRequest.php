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
               'user_type'=>'required',
               'email'=>'required|unique:users,email,'.$id.',id,deleted_at,NULL',
               'username' => 'required'
                 
                 
            ]; 
        } else {
           return [
            'user_type'=>'required',
               'email'=>'required|unique:users,email'.$id,
               'username' => 'required',
               'password'=>'required|min:8',
                
            ];
        } 
      
    }

    public function messages() {
        return [
            'user_type.required'  => 'User Type is mandatory',
            'email.required'  => 'Email Address is mandatory',
            'username.required' => 'Name is mandatory',
            'password.required' => 'Password  is mandatory',
            'confirm_password.required' => 'Confirm Password  is mandatory'

            
        ];
    }
}
