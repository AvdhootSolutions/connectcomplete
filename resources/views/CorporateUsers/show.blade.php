@extends('layouts.app')
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Corporate User</h1>
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
                <h3 class="card-title">View Corporate User </h3>
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
                      <td>Company Name</td>
                      <td>
                        {{$data['users']->company_name}}
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
                      <td>5.</td>
                      <td>Registered Office Address</td>
                      <td>{{$data['users']->registered_office_address}}
                      </td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>Billing Address</td>
                      <td>{{$data['users']->billing_address}}
                      </td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>Organisation Billing Name</td>
                      <td>{{$data['users']->organisation_billing_name}}
                      </td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>GST Number</td>
                      <td>{{$data['users']->gst_number}}
                      </td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>PAN Number</td>
                      <td>{{$data['users']->pan_number}}
                      </td>
                    </tr>
                    
                    <tr>
                      <td>7.</td>
                      <td>Company Logo</td>
                      <td>
                        @if($data['users']->company_logo!="")
                        <img src="{{asset('public/executiveprofilepic/'.$data['users']->company_logo)}}" height="100" width="200">
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
                  <a href="{{route('corporateusers.index')}}" class="btn btn-primary">Back</a>
                </div>
              </form>
            </div>
      <!-- /.card -->
@endsection
@section('extra-scripts')

 


@endsection