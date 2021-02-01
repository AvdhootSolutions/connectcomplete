@extends('layouts.app')
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('content')
  <!-- Default box -->
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$data['page_title']}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start --> @include('layouts.errorMessage')
              @if($data['action']=="create")
              
              {!! Form::open(array(
                            'route' => 'employees.store', 
                            'method'=>'POST', 
                            'files'=> true
                    )) !!}
                    @csrf
              @else
               {{ Form::model($data['user'], array('route' => array('employees.update', $data['user']->id),'role'=>"form" ,'id'=>'productlist-form','enctype'=>'multipart/form-data')) }}
                    {{ method_field('PUT') }}  
                    <input type="hidden" name="action" value="edit">  
                    <input type="hidden" name="id" value="{{$data['user']->id}}">  
              @endif
               
                <div class="card-body">
                  @include('Employee.form-fields')
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
      <!-- /.card -->
@endsection
@section('extra-scripts')
<script >
 $('.cselect').select2({
      placeholder: " Select State"
  });


  $('.sselect').select2({
      placeholder: " Select City"
      
  });

   $(document).on('change', 'select#state_id', function(e) {
   
        e.preventDefault();
        var _this = this;
        var propertyCatId = $(_this).val();
        var city_id = 'city_id';
        var _parent = $('#city_id').parent();

        if (propertyCatId > 0) {
            $.ajax({
                url: '{{route('getcity')}}',
                method: 'GET',
                data: $(_this).serialize(),
                beforeSend: function(data) {
                
                    $("select#" + city_id).empty();
                    $("select#" + city_id).append('<option value="">Please wait...</option>');
                    $("select#" + city_id).trigger("chosen:updated");

                },
                success: function(xhr, textStatus, jQxhr) {
                    $("select#" + city_id).empty();
                    $("select#" + city_id).append('<option value="">Select Option</option>');
                    $.each(xhr.data, function(key, value) {
                        $("select#" + city_id).append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $("select#" + city_id).trigger("chosen:updated");
                    //loadPlugins();
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    alert('Please refresh the page to continue.');
                }
            });
        } else {
            $("select#" + city_id).empty();
            $("select#" + city_id).append('<option value="">Select Option</option>');
            $("select#" + city_id).trigger("chosen:updated");
        }
    });
</script>
@endsection