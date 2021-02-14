@extends('layouts.app')
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Individual User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">View Crew Member</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('content')
  <!-- Default box -->
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View Individual User </h3>
              </div>
          
              
             
              <div class="card-body">
                <table class="table table-bordered">

                  <thead>
                    <tr>
                       
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Name</td>
                      <td>
                        {{$data['users']->name}}
                      </td>
                      
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Email</td>
                      <td>{{$data['users']->email}}
                      </td>
                    </tr>
                     
                    <tr>
                      <td>3.</td>
                      <td>Mobile Number</td>
                      <td>{{$data['users']->mobile_number}}
                      </td>
                    </tr>
                     <tr>
                      <td>3.</td>
                      <td>City</td>
                      <td>{{$data['users']->cities->name}}
                      </td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Address</td>
                      <td>{{$data['users']->address}}
                      </td>
                    </tr>
                    
                    <tr>
                      <td>7.</td>
                      <td>profile_pic</td>
                      <td>
                        @if($data['users']->profile_pic!="")
                        <img src="{{asset('public/executiveprofilepic/'.$data['users']->profile_pic)}}" height="100" width="200">
                        @else
                         <img src="{{asset('public/images/noimage.png')}}" height="100" width="200">
                        @endif
                      </td>
                    </tr>
                    
                   
                    <tr>
                      <td>10.</td>
                      <td>Areas</td>
                      <td>@foreach($data['users']->areas as $key => $area)
                         <label class="label badge bg-success">{{$area->areas->name}}</label>
                        @endforeach
                      </td>
                    </tr>
                    
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button> |
                  <a href="{{route('individualusers.index')}}" class="btn btn-primary">Back</a>
                </div>
              </form>
            </div>
      <!-- /.card -->
@endsection
@section('extra-scripts')

 


@endsection