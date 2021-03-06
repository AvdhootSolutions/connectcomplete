@extends('layouts.app')
@section('page_title',$data['page_title'])
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
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
             
            <!-- /.card -->
              @include('layouts.errorMessage')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$data['page_title']}}</h3>
                <!-- <a href="{{route('states.create')}}" style="float: right;" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>&nbsp;&nbsp;Create</a> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.no</th>
                    <th>Name</th>
                    <th>Child Category</th>
                    <th>Review</th>
                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <style type="text/css">.flex-row{display: flex;}</style>
                  <tbody>
                  @if($data['reviews']!="")
                  @foreach($data['reviews'] as $key=>$reviews) 
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$reviews->childcategory->child_category_name}}</td>
                    <td>{{$reviews->individualUser->name}}</td>
                    <td>{{$reviews->comment}}</td>
                    <td class="project-actions text-right flex-row">
                      <input type="checkbox" data-onstyle="success" data-offstyle="danger" data-id="{{$reviews->id}}" <?php if($reviews->approved=="1") { echo "checked" ; } else { echo "";} ?> class="status" id="status" >&nbsp;

                    
                      <form action="{{ url('/reviews', ['id' => $reviews->id]) }}" method="post" id="delete_form{{$reviews->id}}">
                    <button  data-toggle="modal" data-target="#modal-danger{{ $reviews->id}}"  class="btn btn-danger btn-xs" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        @method('delete')
                        @csrf
                    </form>
                    </td>
                     <!-- Delete Modal -->
                    <div class="modal modal-danger fade" id="modal-danger{{ $reviews->id}}">
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
                            <button type="button" class="btn btn-outline pull-left" onclick="deleteItem('{{ $reviews->id }}')">Ok</button>
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
                    <th>Child Category</th>
                    <th>Review</th>
                    
                    <th>Action</th>
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
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>







<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">


<script>

  $('.status').bootstrapToggle({
      on: 'Yes',
      off: 'No',
      size:'small'
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
        url: '{{ route('reviews.approve')}}',
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
