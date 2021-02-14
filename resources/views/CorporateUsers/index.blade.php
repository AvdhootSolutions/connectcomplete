@extends('layouts.app')
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Corporate User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Corporate User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('content')
    <!-- Default box -->
    <div class="container-fluid">
       <div class="row">
          <div class="col-12">

            <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Search</h3>
                    <div class="col-md-12" style="text-align: center">
                          Total {{count($data['users'])}} Records Found                    

                    </div>
                      
                  </div>
                  <!-- /.card-header -->
                  <form action="{{route('searchCorporate')}}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Company Name</label>
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter  Name" value="{{ isset($data['name'] ) ? $data['name'] : old('name') }}">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email Address" value="{{ isset($data['email'] ) ? $data['email'] : old('email') }}">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Mobile Number</label>
                            <input type="text" name="mobile_number" class="form-control" id="exampleInputEmail1" placeholder="Enter  Mobile Number" value="{{ isset($data['mobile_number'] ) ? $data['mobile_number'] : old('mobile_number') }}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Areas</label>
                             <select name="areas[]" class="form-control areas" multiple="multiple">
                               @if($data['areas']!="")
                               @foreach($data['areas'] as $key => $area)
                                
                               <option value="{{$area->id}}" @if(isset($data['selectedareas']) && in_array($area->id,$data['selectedareas'])) selected="selected"  @endif>{{$area->name}}</option>
                               
                               @endforeach
                               @endif
                             </select>
                          </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        
                    </div>  
                  </div> 
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Search</button>  
                    
                  </div>
                </form>
            </div>      



          </div>
      </div>
        <div class="row">
          <div class="col-12">
             
            <!-- /.card -->
              @include('layouts.errorMessage')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$data['page_title']}}</h3>
                <!-- <a href="{{route('users.create')}}" style="float: right;" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>&nbsp;&nbsp;Create</a> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.no</th>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>City</th>
                    
                    <th>Action</th>
                     <th>Status</th>
                  </tr>
                  </thead>
                  <style type="text/css">.flex-row{display: flex;}</style>
                  <tbody>
                  @if($data['users']!="")
                  @foreach($data['users'] as $key=>$users) 
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$users->company_name}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->cities->name}}</td>  
                    <td class="project-actions text-right flex-row"><a style="margin-right: 5px;" href="{{ route('corporateusers.show',$users->id) }}" class="btn btn-xs btn-success"><i class="fas fa-eye"></i></a>
                      <form action="{{ url('/corporateusers', ['id' => $users->id]) }}" method="post" id="delete_form{{$users->id}}">
                    <button  data-toggle="modal" data-target="#modal-danger{{ $users->id}}"  class="btn btn-danger btn-xs" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        @method('delete')
                        @csrf
                    </form>
                    </td>
                    <td>
                      <input type="checkbox" data-onstyle="success" data-offstyle="danger" data-id="{{$users->id}}" <?php if($users->status=="1") { echo "checked" ; } else { echo "";} ?> class="status" id="status" >
                    </td>
                     <!-- Delete Modal -->
                    <div class="modal modal-danger fade" id="modal-danger{{ $users->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Confirm Delete Action ?</h4>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure you want to delete this Record ? </p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" onclick="deleteItem('{{ $users->id }}')">Ok</button>
                            <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- Delete Modal Ends-->
                  </tr>
                  @endforeach
                  @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr.no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Action</th>
                    <th>Status</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->   
    <!-- /.card -->
@endsection
@section('extra-scripts')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">


<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>




<script>
   $('.areas').select2({
      placeholder: " Select Areas"
      
  });

 $('.status').bootstrapToggle({
      on: 'Active',
      off: 'Inactive',
      size:'mini'
    });
$('.status').on('change.bootstrapSwitch', function(e,data) {
    //alert(e.target.checked);
    var id = $(this).data("id");
    var getstatus = e.target.checked;
    if(getstatus==true){
      status=1;
    } else {
      status=0;
    }


    $.ajax({
        method: 'POST',
        url: '{{ route('corporateusers.updateStatus')}}',
        data: {
          'id':id ,'status': status, '_token': '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(data){
            console.log(data);
            if(data.status=='success')
            {
              toastr.success(data.message);
            } else {
              toastr.error(data.message);
            }
        }
    });
  }); 

















  function deleteItem(id)
{
       
      $('#delete_form'+id)[0].submit();  
       $('#modal-danger'+id).modal('hide');
       
}

  $(function () {
     
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
