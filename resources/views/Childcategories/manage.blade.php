@extends('layouts.app')
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
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Categories</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start --> @include('layouts.errorMessage')
              @if($data['action']=="create")
              
              {!! Form::open(array(
                            'route' => 'childcategories.store', 
                            'method'=>'POST', 
                            'files'=> true
                    )) !!}
                    @csrf
              @else
               {{ Form::model($data['childcategory'], array('route' => array('childcategories.update', $data['childcategory']->id),'role'=>"form" ,'id'=>'productlist-form','enctype'=>'multipart/form-data')) }}
                    {{ method_field('PUT') }}  
                    <input type="hidden" name="action" value="edit"> 
                    <input type="hidden" name="id" value="{{$data['childcategory']->id}}">  
              @endif
               
                <div class="card-body">
                  @include('Childcategories.form-fields')
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