@extends('layouts.app')
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Child Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Child Categories</li>
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
             
            <!-- /.card -->
              @include('layouts.errorMessage')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Gallery</h3>
                <!-- <a href="{{route('childcategories.addgallery',$data['id'])}}" style="float: right;" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>&nbsp;&nbsp;Back</a> -->
                <a href="{{route('childcategories.gallery',$data['id'])}}" class="btn btn-sm btn-success pull-right" style="float: right;"><i class="fa fa-arrow-plus"></i> Back to Gallery</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 @if ($errors->any())
                  <ul class="alert alert-danger  alert-dismissable">
                    @foreach($errors->all() as $error)
                        <li style=" list-style-type: none;" >{{ $error }}</li>
                    @endforeach
                  </ul> 
                  @endif
                   <div class="col-md-12">

                      <form method="post" class="form form-inline" enctype="multipart/form-data" id="gallery-form" action="{{route('childcategories.store.gallery')}}" >

                             @csrf  

                               <input type="hidden" name="child_category_id" value="{{$data['id']}}">
                                
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" id="files" name="product_image[]" multiple class="form-control" />
                                            <div class="gallery">
                                            </div>
                                        </div>
                                    </div>
                                 
                                
                                  <div class="col-md-12">
                                    
                                  
                                    <!-- Hidden Field For Deleted Images-->
                                    <input type="hidden" class="form-control" id="hiddenDeletedImage" name="hiddenDeletedImage" value="">
                                    <?php 
                                    $imgarray = []; 
                                    ?>
                                    @if($data['productImages'] !='')

                                    @foreach($data['productImages'] as $image)

                                        <?php $imgarray[] = $image->image; ?>

                                    <span id="imgcontent{{$image->image}}" class="pip" style="display: inline-block; border:1px solid #444444;">

                                        <img src="{{asset('/public/uploads/'.$image->image)}}" height="100" width="100">

                                         <span class="remove" onClick="detelteImage('{{$image->image}}')">Remove</span>

                                    </span>

                                    @endforeach

                                    <input type="hidden" name="hiddenImage" class="form-control" id="hiddenImage" value="{{ implode(",",$imgarray) }}">

                                    @endif


                                 

                                <div class="row">

                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <button id="step14" type="submit" class="btn btn-success btn-sm">Upload</button> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>          

                    </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->   
    <!-- /.card -->
@endsection
@section('extra-scripts')
<style type="text/css">

  .imageThumb {

  max-height: 75px;

  border: 2px solid;

  padding: 1px;

  cursor: pointer;

}

.pip {

  display: inline-block;



  margin: 10px 10px 10px 16px;

}

.remove {

  display: block;

  background: #444;

   border: 1px solid #444;

  color: white;

  text-align: center;

  cursor: pointer;

}

.remove:hover {

  background: white;

  color: black;

}

.active{

  color:red;

}

</style>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>



if (window.File && window.FileList && window.FileReader) {

    $("#files").on("change", function(e) {

      var files = e.target.files,

        filesLength = files.length;

      for (var i = 0; i < filesLength; i++) {

        var f = files[i]

        var fileReader = new FileReader();

        fileReader.onload = (function(e) {

          var file = e.target;

          $("<span class=\"pip\">" +

            "<img class=\"imageThumb\" height=\"100\" width=\"100\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +

            "<br/><span class=\"remove\">Remove image</span>" +

            "</span>").insertAfter("#files");

          $(".remove").click(function(){

            $(this).parent(".pip").remove();

          });



          

          // Old code here

          /*$("<img></img>", {

            class: "imageThumb",

            src: e.target.result,

            title: file.name + " | Click to remove"

          }).insertAfter("#files").click(function(){$(this).remove();});*/

          

        });

        fileReader.readAsDataURL(f);

      }

      

    });





  } else {

    alert("Your browser doesn't support to File API")

  }









































var Images = [];

function detelteImage(image){

   

  document.getElementById("imgcontent"+image).style.display = "none";

  Images.push(image);

  $("#hiddenDeletedImage").val(Images);

 

  var array = $("#hiddenImage").val().split(",");



  var index = array.filter(function(e) { return e !== image });

  $("#hiddenImage").val(index);



}

 

 

 









 









 





 





     

  </script>

@endsection
