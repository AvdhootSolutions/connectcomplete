@extends('layouts.app')
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assign Crew Member Category </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Assign Crew Member  </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('content')
  <!-- Default box -->
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Assign Crew Member  </h3>
              </div>
          
              <!-- form start --> 
              @include('layouts.errorMessage')
              
              {!! Form::open(array(
                            'route' => 'assignCrewsCategory.store', 
                            'method'=>'POST', 
                            'id'=>'productlist-form',
                            'files'=> true
                    )) !!}
                    @csrf
              <input type="hidden" name="employee_id" value="{{request()->route('id')}}">  
              <div class="card-body">
                   <div class="row">
                      
                       <div class="col-md-6">
                         <div class="form-group">
                          
                           <label for="exampleInputEmail1">Category</label>
                     {!! Form::select('category_id', $data['category'], isset($data['selectedCategory']) ? $data['selectedCategory'] : '',['class' => 'form-control cselect','placeholder' => 'Please Select','id'=>'category_id'] ) !!}
                        </div>
                       </div>
                       <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Subcategory Name</label>
                             {!! Form::select('subcategory_id', $data['subcategory'], isset($data['selectedSubCategory']) ? $data['selectedSubCategory'] : '',['class' => 'form-control sselect',   'placeholder' => 'Please Select','id'=>'subcategory'] ) !!}
                          </div>
                       </div>
                      
                   </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

              </form>
            </div>
      <!-- /.card -->
      <div class="card card-primary">
              <div class="card-header" style="background-color: #001f3f">
                <h3 class="card-title">List Of Assign Category </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->  
              <div class="card-body">
                   <table id="example1" class="table table-bordered table-striped">
                     <thead>
                      <tr>
                       <th>Sr.no</th>
                       <th>Category</th>
                       <th>Subcategory</th>
                       <th>Action</th>
                      </tr>
                     </thead>
                     <tbody>
                      @if($data['employeeCategory']!="")
                      @foreach($data['employeeCategory'] as $key =>$employeeCategory)
                       <tr>
                         <td>{{$key+1}}</td>
                         <td>@if($employeeCategory->category!="") {{$employeeCategory->category->category_name}} @endif</td>
                         <td>@if($employeeCategory->subcategory!="") {{$employeeCategory->subcategory->subcategory_name}} @endif</td>
                         <td>
                           <form action="{{ url('/employeeCategoryDelete', ['id' => $employeeCategory->id]) }}" method="post" id="delete_form{{$employeeCategory->id}}">
                          <button  data-toggle="modal" data-target="#modal-danger{{ $employeeCategory->id}}"  class="btn btn-danger btn-xs" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                              @method('delete')
                              @csrf
                          </form>
                          <!-- Delete Modal -->
                          <div class="modal modal-danger fade" id="modal-danger{{ $employeeCategory->id}}">
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
                                  <button type="button" class="btn btn-outline pull-left" onclick="deleteItem('{{ $employeeCategory->id }}')">Ok</button>
                                  <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- Delete Modal Ends-->
                         </td>
                       </tr>
                       @endforeach
                       @endif
                     </tbody>
                     <tfoot>
                       <tr>
                       <th>Sr.no</th>
                       <th>Category</th>
                       <th>Subcategory</th>
                       <th>Action</th>
                      </tr>
                      </tfoot>
                   </table>
              </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{route('crews.index')}}" class="btn btn-primary">Back</a>
                </div>
              </form>
            </div>
@endsection
@section('extra-scripts')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
 

<script >

function deleteItem(id)
{
    $('#delete_form'+id)[0].submit();  
    $('#modal-danger'+id).modal('hide');
}



$(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      
    });
});

$('.cselect').select2({
  placeholder: " Select Category"
});

$('.sselect').select2({
  placeholder: " Select Subcategory"
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


 


</script>
@endsection