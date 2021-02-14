@extends('layouts.app')
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assign Inquiry To Executive </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Assign Inquiry To Executive </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('content')
  <!-- Default box -->
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Assign Inquiry To Executive</h3>
              </div>
          
              <!-- form start --> 
              @include('layouts.errorMessage')
              
              {!! Form::open(array(
                            'route' => 'storeAssignExecutiveinquiry', 
                            'method'=>'POST', 
                            'id'=>'productlist-form',
                            'files'=> true
                    )) !!}
                    @csrf

                 <input type="hidden" name="inquiry_id" value="{{ request()->route()->parameter('id') }}">
              <div class="card-body">
                <div class="row">
                  @foreach($data['executive'] as $key =>$executive)
                    <div class="col-md-3"> 
                      <div class="icheck-primary d-inline">
                            <input type="checkbox" id="radioPrimary{{$executive->id}}"  value="{{$executive->id}}" name="executive[]" @if(in_array($executive->id,$alreadyAssign)) checked @endif>
                            <label for="radioPrimary{{$executive->id}}"> {{ ucfirst($executive->name)}}
                            </label>
                      </div>
                    </div>
                  @endforeach


                  <!-- <div class="col-md-6">
                    <label>Select Executive</label>
                    <select name="executive_id" class="form-control select2">
                      @foreach($data['executive'] as $key =>$executive)
                      <option value="{{$executive->id}}">{{$executive->name}}</option>
                      @endforeach
                    </select>
                  </div> -->

                  
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Assign Now</button>
              </div>

              </form>
            </div>
      <!-- /.card -->
      <div class="card card-primary">
              <div class="card-header" style="background-color: #001f3f">
                <h3 class="card-title">List Of Assigned Executives </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->  
              <div class="card-body">
                
                   <table id="example1" class="table table-bordered table-striped">
                     <thead>
                      <tr>
                       <th>Sr.no</th>
                       <th>Executive Name</th>
                       <th>Action</th>
                      </tr>
                     </thead>
                     <tbody>
                      @if($data['executiveInquiry']!="")
                      @foreach($data['executiveInquiry'] as $key =>$executiveInquiry)
                       <tr>
                          <td>{{$key+1}}</td>
                          <td>@if($executiveInquiry->executives!=""){{ $executiveInquiry->executives->name }}@endif</td>
                          <td>
                           <form action="{{ url('/deleteExecutiveInquiry', ['id' => $executiveInquiry->id]) }}" method="post" id="delete_form{{$executiveInquiry->id}}">
                              

                          <button  data-toggle="modal" data-target="#modal-danger{{ $executiveInquiry->id}}"  class="btn btn-danger btn-xs" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                              @method('delete')
                              @csrf
                          </form>
                          <!-- Delete Modal -->
                          <div class="modal modal-danger fade" id="modal-danger{{ $executiveInquiry->id}}">
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
                                  <button type="button" class="btn btn-outline pull-left" onclick="deleteItem('{{ $executiveInquiry->id }}')">Ok</button>
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
                       <th>Executive Name</th>
                       <th>Action</th>
                      </tr>
                      </tfoot>
                   </table>
              
              </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{route('individualinquiry.index')}}" class="btn btn-primary">Back</a>
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
      "searching": false,
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