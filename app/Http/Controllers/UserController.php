<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\States;
use App\Models\Cities;
use App\Models\Areas;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->page_data['page_title'] = 'Users';
        
    }

    public function index()
    {
        $data = [];
        $data['page_title']="City Admin";
        $data['users']=User::with(['states','cities'])->role('cityadmin')->get(); 
        return view('Users.index',compact('data'));
    }

     
    public function create()
    {
        $data = [];
        $data['page_title']="Creat City Admin";
        $data['action'] ="create";
        $data['state']=States::pluck('name','id');
        $data['selectedState']='';
        $data['city']=[];
        $data['selectedCity']='';
        return view('Users.manage',compact('data'));   
    }

    
    public function store(Request $request)
    {    
         $user = new User();
         $user->name = $request->username;
         $user->email = $request->email;
         $user->password = $request->password;
         $user->save();
         $user->assignRole('employee');
    }

     
    public function show($id)
    {
        //
    }

     
    public function edit($id)
    {
        //
    }
   
    public function update(Request $request, $id)
    {
        //
    }

     
    public function destroy($id)
    {
        //
    }
}
