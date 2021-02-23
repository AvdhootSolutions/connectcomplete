@extends('layouts.app')
@section('page_title',$data['page_title'])
@section('extra-css')
 <link rel="stylesheet" href="{{asset('public/theme/extra.css')}}">
 <link rel="stylesheet" href="{{asset('public/theme/plugins/daterangepicker/daterangepicker.css')}}">

@endsection
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

     
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  <div class="row">
                     <!-- left column -->
                     <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Advance Search</h3>
                           </div>
                           <form action="{{route('individualinquiry.search')}}">
                              <div class="col-md-12">
                                 <div class="row">
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Inquiry Code Wise</label>
                                          <input type="text" name="code" class="form-control" placeholder="Enter Code" value="{{isset(request()->code) ? request()->code:'' }}">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Customer Name</label>
                                          <input type="text" name="fullname" class="form-control" placeholder="Enter Customer Name" value="{{isset(request()->fullname) ? request()->fullname:'' }}">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Inquiry Status Wise Filter</label>
                                          <select name="inquiry_status" class="form-control select2" style="width: 100%;">
                                             <option value="">Select Status</option>
                                             <option value="0">Open</option>
                                             <option value="1">Close By Admin/Client</option>
                                             <option value="2">Completed</option>
                                             <option value="3">Assign to Executive</option>
                                             <option value="4">Assign to Executive</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Inquiry Payment Status Wise Filter</label>
                                          <select class="form-control select2" style="width: 100%;">
                                             <option value="" >Select Status</option>
                                             <option>Payment Status</option>
                                             <option>Payment Status</option>
                                             <option>Payment Status</option>
                                             <option>Payment Status</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Inquiry Stage Wise Filter</label>
                                          <select name="inquiry_stage" class="form-control select2" style="width: 100%;">
                                             <option  value="">Select Stage</option>
                                             <option value="0">Pending</option>
                                             <option value="1">Completed</option>
                                             <option value="2">Executive</option>
                                             <option value="3">Crew</option>
                                             
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Inquiry Date Range</label>
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                              </span>
                                            </div>
                                            <input type="text" name="inquiry_date" class="form-control float-right" id="reservation">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label>Select Area</label>
                                          <select name="area_id[]" class="form-control areas" style="width: 100%;" multiple="multiple">
                                              @foreach($data['areas'] as $key=>$area)
                                              <option value="{{$area->id}}">{{$area->name}}</option>
                                              @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label>Select  Inquiry Category</label>
                                          <select name="category_id" class="form-control cselect" id="category_id" style="width: 100%;">
                                            <option value="">Select</option>
                                            @foreach($data['category'] as $key=>$category)
                                              <option value="{{$category->id}}">{{$category->category_name}}</option>
                                              @endforeach
                                            
                                             <!-- <option selected="selected">Property Category</option> -->

                                              
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label>Select  Sub Category</label>
                                          <select name="subcategory_id" class="form-control sselect" id="subcategory" style="width: 100%;">
                                             
                                              
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label>Select Child Category Wise</label>
                                          <select name="child_category_id" class="form-control childselect" id="childcategory" style="width: 100%;">
                                             
                                              
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
                        <!-- /.card-body -->
                     </div>
                  </div>
               </div>
            </section>
            <!-- Listing Start -->
            <div class="content">
               <div class="container">
                  <h5 style="text-align: center;"> Total {{$data['inquiries']->total()}} Inquiries Found </h5>
                     @include('layouts.errorMessage')
                  <div class="row">
                    @if($data['inquiries']->total()>0)
                    @foreach($data['inquiries'] as $key => $inquiry)
                     <!-- /.col-md-6 -->
                     <div class="col-lg-6">
                       
                        <div class="card card-primary card-outline">
                           <div class="ribbon-wrapper ribbon-lg">
                              <div class="ribbon bg-success text-lg">
                                 @if($inquiry->inquiry_status==0)
                              Open
                              @endif
                              
                              @if($inquiry->inquiry_status==1)
                              Close (by CLient / by Admin)
                              @endif
                              
                              @if($inquiry->inquiry_status==2)
                              Succesfully Completed
                              @endif
                              
                              @if($inquiry->inquiry_status==3)
                              ASSIGN TO EXECUTIVE
                              @endif

                              @if($inquiry->inquiry_status==3)
                              ASSIGN TO CREW
                              @endif
                              </div>
                           </div>
                           <div class="row row-padding">
                              <div class="col-md-12">
                                 <h5><span class="square_badge">Inquiry Code {{$inquiry->code}} </span> {{$inquiry->fullname}}</h5>
                                 <hr />
                                 <p class="p_tag"> <i class="fa fa-map-marker icon-color" aria-hidden="true"></i> {{$inquiry->full_address}}
                                 </p>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <p class="p_tag"> <i class="fa fa-home icon-color"></i> {{ \Helper::getCity($inquiry->city_id) }} <span class="badge">{{ \Helper::getArea($inquiry->area_id) }}</span> </p>
                                       <p class="p_tag"> <i class="fa fa-envelope icon-color" aria-hidden="true"></i> {{$inquiry->email}} </p>
                                       <p class="p_tag"> 
                                          <i class="fa fa-server icon-color" aria-hidden="true"></i> @if($inquiry->inquiry_stage==0)
                                          Pending 
                                          @endif
                                          
                                          @if($inquiry->inquiry_stage==1)
                                          Completed 
                                          @endif
                                          
                                          @if($inquiry->inquiry_stage==2)
                                          Executive 
                                          @endif
                                          
                                          @if($inquiry->inquiry_stage==3)
                                          Crew
                                          @endif
                                       </p>
                                       <p class="p_tag"> 
                                          <i class="fa fa-credit-card-alt icon-color" aria-hidden="true"></i> Payment : 
                                          <span class="badge">Paid / Unpaid</span> 
                                       </p>
                                    </div>
                                    <div class="col-md-6">
                                       <p class="p_tag"> 
                                          <i class="fa fa-inr icon-color" aria-hidden="true"></i> Total Amount
                                       </p>
                                       <p class="p_tag"> <i class="fa fa-phone-square icon-color" aria-hidden="true"></i> {{$inquiry->mobile_number}} </p>
                                       <p class="p_tag"> 
                                          <i class="fa fa-calendar icon-color" aria-hidden="true"></i> Inquiry Date {{ date('d M Y',strtotime($inquiry->inquiry_date)) }}
                                       </p>
                                    </div> 
                                 </div>
                                 <div class="row margin-top10">
                                    <div class="col-md-3">
                                       <a href="{{ route('assignexecutiveinquiry',['id'=>$inquiry->id,'cat_id'=>$inquiry->inquirydetails[0]->category->id,'subcat_id'=>$inquiry->inquirydetails[0]->subcategory->id,'area_id'=>$inquiry->area_id]) }}"  class="btn btn-block bg-gradient-primary">Executive</a>
                                    </div>
                                    <div class="col-md-3">
                                       <a  href="{{ route('assigncrewsinquiry',['id'=>$inquiry->id,'cat_id'=>$inquiry->inquirydetails[0]->category->id,'subcat_id'=>$inquiry->inquirydetails[0]->subcategory->id,'area_id'=>$inquiry->area_id]) }}" class="btn btn-block bg-gradient-success">Crew</a>
                                    </div>
                                    <div class="col-md-3">
                                       <button type="button" class="btn btn-block bg-gradient-secondary">Payments</button>
                                    </div>
                                    <div class="col-md-3">
                                       <a href="{{route('viewDetails',$inquiry->id)}}" class="btn btn-block bg-gradient-warning">Details</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div> 
                     </div>
                     <!-- /.card -->
                    @endforeach
                    @endif 
                  </div>
                  <!-- /.col-md-6 -->

               </div>
               <!-- /.row -->

 
               {{ $data['inquiries']->links('vendor.pagination.default') }}

            </div>
            <!-- /.container-fluid -->
          






























    
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
<script src="{{asset('public/theme/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/theme/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script >
     $('#reservation').daterangepicker({
      locale: {
      format: 'DD-MM-YYYY'
    },
     });
</script>
@endsection
