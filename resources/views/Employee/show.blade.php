@extends('layouts.app')
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Crew  Member</h1>
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
                <h3 class="card-title">View Crew Member </h3>
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
                      <td>Designation</td>
                      <td>{{$data['users']->designation}}
                      </td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Mobile Number</td>
                      <td>{{$data['users']->mobile_number}}
                      </td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>goverment_proff</td>
                      <td><img src="{{asset('public/employeegovementproff/'.$data['users']->goverment_proff)}}" height="100" width="200"> 
                      </td>
                    </tr>
                    <tr>
                      <td>6.</td>
                      <td>police_verification</td>
                      <td><img src="{{asset('public/employeePoliceproff/'.$data['users']->police_verification)}}" height="100" width="200"> 
                      </td>
                    </tr> 
                    <tr>
                      <td>7.</td>
                      <td>profile_pic</td>
                      <td>
                        @if($data['users']->profile_pic!="")
                        <img src="{{asset('public/employeeprofilepic/'.$data['users']->profile_pic)}}" height="100" width="200">
                        @else
                         <img src="{{asset('public/images/noimage.png')}}" height="100" width="200">
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>8.</td>
                      <td>Experience</td>
                      <td>{{$data['users']->experience}}
                      </td>
                    </tr>
                    <tr>
                      <td>9.</td>
                      <td>Remarks</td>
                      <td>{{$data['users']->remarks}}
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
                    <tr>
                      <td>11.</td>
                      <td>Category</td>
                      <td>@foreach($data['users']->category as $key => $category)
                         <label class="label badge bg-danger">{{$category->category->category_name}}</label>
                        @endforeach
                      </td>
                    </tr>
                    <tr>
                      <td>12.</td>
                      <td>Subcategory</td>
                      <td>@foreach($data['users']->category as $key => $category)
                         <label class="label badge bg-primary">{{$category->subcategory->subcategory_name}}</label>
                        @endforeach
                      </td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button> |
                  <a href="{{route('crews.index')}}" class="btn btn-primary">Back</a>
                </div>
              </form>
            </div>
      <!-- /.card -->
@endsection
@section('extra-scripts')

 


@endsection