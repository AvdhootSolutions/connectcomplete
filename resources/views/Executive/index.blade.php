@extends('layouts.app')
@section('page_title',$data['page_title'])
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Executives</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Executives listing</li>
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
                          Total {{count($data['executive'])}} Records Found                    

                    </div>
                      
                  </div>
                  <!-- /.card-header -->
                  <form action="{{route('searchExecutive')}}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter  Name" value="{{ isset($data['name'] ) ? $data['name'] : old('name') }}">
                          </div>
                        </div>
                        <div class="col-md-3">
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
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                             {!! Form::select('category_id', $data['category'], isset($data['selectedCategory']) ? $data['selectedCategory'] : '',['class' => 'form-control cselect','placeholder' => 'Please Select','id'=>'category_id'] ) !!}
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Subcategory</label>
                            {!! Form::select('subcategory_id', $data['subcategory'], isset($data['selectedSubCategory']) ? $data['selectedSubCategory'] : '',['class' => 'form-control sselect',   'placeholder' => 'Please Select','id'=>'subcategory'] ) !!}
                          </div>
                        </div>
                        
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
              <a href="{{route('executives.create')}}" style="float: right;" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>&nbsp;&nbsp;Create</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr.no</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Designation</th>
                  <th>Action</th>
                  <th>Assign</th>
                </tr>
                </thead>
                <style type="text/css">.flex-row{display: flex;}</style>
                <tbody>
                @if($data['executive']!="")
                @foreach($data['executive'] as $key=>$users) 
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$users->name}}</td>
                  <td>{{$users->email}}</td>
                  <td>{{$users->mobile_number}}</td>
                  <td>{{$users->designation}}</td>
               
                  
                   
                  <td class="project-actions text-right flex-row">
                    <a style="margin-right: 5px;" href="{{ route('executives.show',$users->id) }}" class="btn btn-xs btn-success"><i class="fas fa-eye"></i></a>
                    
                    <a style="margin-right: 5px;" href="{{ route('executives.edit',$users->id) }}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>
                    <form action="{{ url('/executives', ['id' => $users->id]) }}" method="post" id="delete_form{{$users->id}}">
                  <button  data-toggle="modal" data-target="#modal-danger{{ $users->id}}"  class="btn btn-danger btn-xs" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                      @method('delete')
                      @csrf
                  </form>
                  </td>
                  <td><a href="{{route('assignCategory',$users->id)}}" class="btn btn-xs btn-outline btn-primary">Assign Categories</a></td>
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
                  <th>Mobile Number</th>
                  <th>Designation</th>
                 
                  <th>Action</th>
                  <th>Assign</th>
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
<script>
  function deleteItem(id)
{
       
      $('#delete_form'+id)[0].submit();  
       $('#modal-danger'+id).modal('hide');
       
}

  $(function () {
     
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf","colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

   $('.cselect').select2({
      placeholder: " Select Category",
      allowClear: true
  });
  $('.sselect').select2({
      placeholder: " Select Subcategory",
      allowClear: true
      
  });

   $('.childselect').select2({
      placeholder: " Select Child Category"
      
  });

   $('.areas').select2({
      placeholder: " Select Areas"
      
  });

   $(document).on('change', 'select#category_id', function(e) {
   
        e.preventDefault();
        var _this = this;
        var propertyCatId = $(_this).val();
        var subcategory = 'subcategory';
        var _parent = $('#subcategory').parent();

        if (propertyCatId > 0) {
            $.ajax({
                url: '{{route('getsubcategory')}}',
                method: 'GET',
                data: $(_this).serialize(),
                beforeSend: function(data) {
                
                    $("select#" + subcategory).empty();
                    $("select#" + subcategory).append('<option value="">Please wait...</option>');
                    $("select#" + subcategory).trigger("chosen:updated");

                },
                success: function(xhr, textStatus, jQxhr) {
                    $("select#" + subcategory).empty();
                    $("select#" + subcategory).append('<option value="">Select Option</option>');
                    $.each(xhr.data, function(key, value) {
                        $("select#" + subcategory).append('<option value="' + value.id + '">' + value.subcategory_name + '</option>');
                    });
                    $("select#" + subcategory).trigger("chosen:updated");
                    //loadPlugins();
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    alert('Please refresh the page to continue.');
                }
            });
        } else {
            $("select#" + subcategory).empty();
            $("select#" + subcategory).append('<option value="">Select Option</option>');
            $("select#" + subcategory).trigger("chosen:updated");
        }
    });


   $(document).on('change', 'select#subcategory', function(e) {
   
        e.preventDefault();
        var _this = this;
        var propertyCatId = $(_this).val();
        var childcategory = 'childcategory';
        var _parent = $('#childcategory').parent();

        if (propertyCatId > 0) {
            $.ajax({
                url: '{{route('getchildcategory')}}',
                method: 'GET',
                data: $(_this).serialize(),
                beforeSend: function(data) {
                
                    $("select#" + childcategory).empty();
                    $("select#" + childcategory).append('<option value="">Please wait...</option>');
                    $("select#" + childcategory).trigger("chosen:updated");

                },
                success: function(xhr, textStatus, jQxhr) {
                    $("select#" + childcategory).empty();
                    $("select#" + childcategory).append('<option value="">Select Option</option>');
                    $.each(xhr.data, function(key, value) {
                        $("select#" + childcategory).append('<option value="' + value.id + '">' + value.child_category_name + '</option>');
                    });
                    $("select#" + childcategory).trigger("chosen:updated");
                    //loadPlugins();
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    alert('Please refresh the page to continue.');
                }
            });
        } else {
            $("select#" + childcategory).empty();
            $("select#" + childcategory).append('<option value="">Select Option</option>');
            $("select#" + childcategory).trigger("chosen:updated");
        }
    });


</script>
@endsection
