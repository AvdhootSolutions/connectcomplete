@extends('layouts.app')
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">View Blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('content')
  <!-- Default box -->
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View Blog </h3>
              </div>
          
              
             
              <div class="card-body">
                <table class="table table-bordered">

                  <thead>
                    <tr>
                       
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Title</td>
                      <td>
                        {{$data['blogs']->title}}
                      </td>
                      
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Author</td>
                      <td>{{$data['blogs']->author}}
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Description</td>
                      <td>{{$data['blogs']->description}}
                      </td>
                    </tr>
                     
                   
                    @if($data['blogs']->media_type==1)
                    <tr>
                      <td>4.</td>
                      <td>Image</td>
                      <td>
                        @if($data['blogs']->blog_image!="")
                        <img src="{{asset('public/blogs/'.$data['blogs']->blog_image)}}" height="100" width="200">
                        @else
                         <img src="{{asset('public/images/noimage.png')}}" height="100" width="200">
                        @endif
                      </td>
                    </tr>
                    @else

                    <tr>
                      <td>4.</td>
                      <td>Video Url</td>
                      <td>{{$data['blogs']->video_url}}
                      </td>
                    </tr>
                    @endif
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button> |
                  <a href="{{route('crews.index')}}" class="btn btn-primary">Back</a>
                </div>
              </form>
            </div>
      <!-- /.card -->
@endsection
@section('extra-scripts')

 


@endsection