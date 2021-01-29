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
                            'route' => 'categories.store', 
                            'method'=>'POST', 
                            'files'=> true
                    )) !!}
                    @csrf
              @else
               {{ Form::model($data['category'], array('route' => array('categories.update', $data['category']->id),'role'=>"form" ,'id'=>'productlist-form','enctype'=>'multipart/form-data')) }}
                    {{ method_field('PUT') }}  
                    <input type="hidden" name="action" value="edit">    
                    <input type="hidden" name="id" value="{{$data['category']->id}}">
              @endif
               
                <div class="card-body">
                  @include('Categories.form-fields')
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
      <!-- /.card -->
@endsection
