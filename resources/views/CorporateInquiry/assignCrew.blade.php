@extends('layouts.app')
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assign Corporate Inquiry To Crew Member </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Assign Corporate Inquiry To Crew Member </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('content')
  <!-- Default box -->
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Assign Corporate Inquiry To Crew Member</h3>
              </div>
          
              <!-- form start --> 
              @include('layouts.errorMessage')
              
              {!! Form::open(array(
                            'route' => 'storeAssignCorporateCrewsinquiry', 
                            'method'=>'POST', 
                            'id'=>'productlist-form',
                            'files'=> true
                    )) !!}
                    @csrf

                 <input type="hidden" name="inquiry_id" value="{{ request()->route()->parameter('id') }}">
              <div class="card-body">
                <div class="row">
                  @foreach($data['crew'] as $key =>$crew)
                    <div class="col-md-3"> 
                      <div class="icheck-primary d-inline">
                            <input type="checkbox" id="radioPrimary{{$crew->id}}"  value="{{$crew->id}}" name="crew[]" @if(in_array($crew->id,$alreadyAssign)) checked @endif>
                            <label for="radioPrimary{{$crew->id}}"> {{ ucfirst($crew->name)}}
                            </label>
                      </div>
                    </div>
                  @endforeach


                  

                  
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
                <h3 class="card-title">List Of Assigned Corporate Crew Members </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->  
              <div class="card-body">
                
                   <table id="example1" class="table table-bordered table-striped">
                     <thead>
                      <tr>
                       <th>Sr.no</th>
                       <th>Crew Member Name</th>
                       <th>Action</th>
                      </tr>
                     </thead>
                     <tbody>
                      @if($data['crewInquiry']!="")
                      @foreach($data['crewInquiry'] as $key =>$crewInquiry)
                       <tr>
                          <td>{{$key+1}}</td>
                          <td>@if($crewInquiry->crews!=""){{ $crewInquiry->crews->name }}@endif</td>
                          <td>
                           <form action="{{ url('/deletecrewInquiry', ['id' => $crewInquiry->id]) }}" method="post" id="delete_form{{$crewInquiry->id}}">
                              

                          <button  data-toggle="modal" data-target="#modal-danger{{ $crewInquiry->id}}"  class="btn btn-danger btn-xs" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                              @method('delete')
                              @csrf
                          </form>
                          <!-- Delete Modal -->
                          <div class="modal modal-danger fade" id="modal-danger{{ $crewInquiry->id}}">
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
                                  <button type="button" class="btn btn-outline pull-left" onclick="deleteItem('{{ $crewInquiry->id }}')">Ok</button>
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