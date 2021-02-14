@extends('layouts.app')
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>City Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">City Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('content')
  <!-- Default box -->
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">City Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start --> @include('layouts.errorMessage')
              @if($data['action']=="create")
              
              {!! Form::open(array(
                            'route' => 'users.store', 
                            'method'=>'POST', 
                            'id'=>'productlist-form',
                            'files'=> true
                    )) !!}
                    @csrf
              @else
               {{ Form::model($data['user'], array('route' => array('users.update', $data['user']->id),'role'=>"form" ,'id'=>'productlist-form','enctype'=>'multipart/form-data')) }}
                    {{ method_field('PUT') }}  
                    <input type="hidden" name="action" value="edit">  
                    <input type="hidden" name="id" value="{{$data['user']->id}}">  
              @endif
               
                <div class="card-body">
                  @include('Users.form-fields')
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
 

<script >
 $('.cselect').select2({
      placeholder: " Select State"
  });


  $('.sselect').select2({
      placeholder: " Select City"
      
  });

  $('.areas').select2({
      placeholder: " Select Areas"
      
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

   <?php if(isset($data['assignedAreas'])) {?>
    $("#assign_area").show();

    <?php

   } else {
    ?>
   $("#assign_area").hide();

    <?php
   } ?>

   $(document).on('change', 'select#city_id', function(e) {
     
        e.preventDefault();
        var _this = this;
        var propertyCatId = $(_this).val();
        var area_id = 'area_id';
        var _parent = $('#area_id').parent();

        if (propertyCatId > 0) {
            $.ajax({
                url: '{{route('getareas')}}',
                method: 'GET',
                data: $(_this).serialize(),
                beforeSend: function(data) {
                    $("#list_area").empty();
                    $("select#" + area_id).empty();
                    $("select#" + area_id).append('<option value="">Please wait...</option>');
                    $("select#" + area_id).trigger("chosen:updated");
                },
                success: function(xhr, textStatus, jQxhr) {
                    $("#assign_area").show();
                     
                    $.each(xhr.selectedAreas, function(key, value) {
                        $("#list_area").append('<li style="padding:0 15px;background-color:#007bff;border-color: #006fe6;color: #fff;margin-right:5px;">' + value.name + '</li>');
                    });

                    $("select#" + area_id).empty();
                    $("select#" + area_id).append('<option value="">Select Option</option>');
                    $.each(xhr.data, function(key, value) {
                        $("select#" + area_id).append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $("select#" + area_id).trigger("chosen:updated");
                    //loadPlugins();
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    alert('Please refresh the page to continue.');
                }
            });
        } else {
            $("select#" + area_id).empty();
            $("select#" + area_id).append('<option value="">Select Option</option>');
            $("select#" + area_id).trigger("chosen:updated");
        }
    });


$("#productlist-form").validate({

      rules: {
      // simple rule, converted to {required:true}
     //  brand_name :"required",
     
     
      name:{
        required:true
      }, user_type:{
        required:true
      },
      username:{
        required:true
      },
      email:{
        required:true,email: true
      },
       <?php if($data['action']=="create"){?>
      password:{
        required:true
      },
    <?php } ?>
      designation:{
        required:true
      },
      mobile_number:{
        required:true,
        minlength:10,
      maxlength:10,
      number: true
      }, 
      state_id:{
        required:true
      },
      city_id:{
        required:true
      },
      contact_person:{
        required:true
      },
    },
    errorPlacement: function errorPlacement(error, element) {
        var $parent = $(element).parents('.form-group');

        // Do not duplicate errors
        if ($parent.find('.jquery-validation-error').length) { return; }

        $parent.append(
          error.addClass('jquery-validation-error small form-text invalid-feedback')
        );
      },
      highlight: function(element) {
        var $el = $(element);
        var $parent = $el.parents('.form-group');

        $el.addClass('is-invalid');

        // Select2 and Tagsinput
        if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
          $el.parent().addClass('is-invalid');
        }
      },
      unhighlight: function(element) {
        $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
      }
     


  }); 



</script>
@endsection