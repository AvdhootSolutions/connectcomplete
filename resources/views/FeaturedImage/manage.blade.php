@extends('layouts.app')
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Featured Image</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Featured Image</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('content')
  <!-- Default box -->
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Featured Image</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start --> @include('layouts.errorMessage')
              @if($data['action']=="create")
              
              {!! Form::open(array(
                            'route' => 'featuredimages.store', 
                            'method'=>'POST', 
                            'files'=> true
                    )) !!}
                    @csrf
              @else
               {{ Form::model($data['featuredimages'], array('route' => array('featuredimages.update', $data['featuredimages']->id),'role'=>"form" ,'id'=>'productlist-form','enctype'=>'multipart/form-data')) }}
                    {{ method_field('PUT') }}  
                    <input type="hidden" name="action" value="edit">    
                    <input type="hidden" name="id" value="{{$data['featuredimages']->id}}">
              @endif
               
                <div class="card-body">
                  @include('FeaturedImage.form-fields')
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
<script>



 $('#blog_image').hide(); 
 $('#video_url').hide(); 
 <?php
if(isset($data['blogs']->media_type) &&  $data['blogs']->media_type==1) {
  ?>

$('#blog_image').show(); 
 $('#video_url').hide();
<?php
}
if(isset($data['blogs']->media_type) &&  $data['blogs']->media_type==2) {
  ?>

 $('#blog_image').hide();
$('#video_url').show(); 
<?php }

?>
  
function mediaType(sel)
{
   var media_type =  sel.value;
   
   if(media_type==1)
   {
      $('#blog_image').show(); 
      $('#video_url').hide();  
   }
    if(media_type==2)
    {
      $('#blog_image').hide(); 
      $('#video_url').show();  
    }
}
  
</script>

@endsection



