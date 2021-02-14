@extends('layouts.app')
@section('page_title',$data['page_title'])
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Corporate Inquiries</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Corporate listing</li>
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
                          Total {{count($data['inquiries'])}} Records Found                    

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
                                
                             </select>
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
           
          @include('layouts.errorMessage')
          @if($data['inquiries']!="")
          @foreach($data['inquiries'] as $key => $inquiry)
          <!-- /.card -->
          <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title">Inquiry Code :- {{$inquiry->code}}</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <h5 class="card-title">Details</h5>
                </div>
                
                <div class="col-md-12">
                      <ul class="nav flex-column">
                        @if($inquiry->corporatedetails!="")
                        @foreach($inquiry->corporatedetails as $key =>$details)
                        <li class="nav-item">
                          
                            Category :- {{$details->category->category_name}} / 
                            Subcategory :- {{$details->subcategory->subcategory_name}} / 
                            Child Category :- {{$details->childcategory->child_category_name}}
                          
                        </li>
                        @endforeach
                        @endif
                        
                      </ul>
                    
                  </div>
                 
                <a href="{{ route('assignCorporateExecutiveinquiry',['id'=>$inquiry->id,'cat_id'=>$inquiry->corporatedetails[0]->category->id,'subcat_id'=>$inquiry->corporatedetails[0]->subcategory->id,'area_id'=>$inquiry->area_id]) }}" class="btn btn-primary">Assign Executive</a>
                <a href="#" class="btn btn-primary">Payments</a>
                <a href="{{ route('assignCorporateCrewsinquiry',['id'=>$inquiry->id,'cat_id'=>$inquiry->corporatedetails[0]->category->id,'subcat_id'=>$inquiry->corporatedetails[0]->subcategory->id,'area_id'=>$inquiry->area_id]) }}" class="btn btn-primary">Assign Crews</a>
              </div>
            </div>
          <!-- /.card -->
          @endforeach
          @endif


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
