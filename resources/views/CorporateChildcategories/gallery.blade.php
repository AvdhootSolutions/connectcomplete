@extends('app')



@section('content')

 

<style type="text/css">

  .error {

    color: red !important;

  }



</style>

 



<section class="content-header">

  <h1>

    {{ strtoupper(Request::segment(2)) }}

    <!-- @for($i = 2; $i <= count(Request::segments()); $i++)

            {{strtoupper(Request::segment($i))}}

    @endfor -->



  </h1>



  <ol class="breadcrumb">

    <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>

    @for($i = 2; $i <= count(Request::segments()); $i++)

         <li class="active">   {{strtoupper(Request::segment($i))}}</li>  

    @endfor

      

   

  </ol>

</section>

<section class="content">

  <div class="row">

    <div class="col-md-12">

      <div class="box box-primary">

        

            <div class="box-header with-border">

              <h3 class="box-title"> 

                {{ strtoupper(Request::segment(2)) }} / {{ strtoupper(Request::segment(3)) }} 

              </h3>

            </div>

            @if ($errors->any())

                  <ul class="alert alert-danger  alert-dismissable">

                    @foreach($errors->all() as $error)

                        <li style=" list-style-type: none;" >{{ $error }}</li>

                    @endforeach

                  </ul> 

            @endif

                <div class="box-body">

                    <div class="panel-heading">

                        <h4 class="panel-title">

                            <span class="glyphicon glyphicon glyphicon-film">

                            </span> Listing Of Gallery 

                        </h4>

                    </div>

                    <div id="collapseThree" class="panel-collapse collapse in">

                      

                        <div class="panel-body">

                          <a href="{{route('coupons.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back To Coupons</a>



                          @if(count($data['productImages'])<5)

                          <a href="{{route('coupons.addgallery',$data['id'])}}" class="btn btn-sm btn-success pull-right"><i class="fa fa-arrow-plus"></i> Add Images</a>

                          @endif

                          

                          <table id="example" class="table table-bordered table-striped table-responsive">

                            <thead>

                            <tr>

                              <th>SrNo.</th>

                              <th>Product Images</th>

                              <th>Manage</th>

                            </tr>

                            </thead>

                            <tbody>



                                @foreach($data['productImages'] as $key =>$value)

                                <tr>

                                  <td>{{$key+1}}</td>

                                   <td>

                                    <img src="{{asset('uploads').'/'.$value->product_image}}" height="100" width="200">

                                  </td>    

                                  

                                      

                                  <td>

                                     <form id='delete' style='display: inline-block;' action='{{ route('coupons.gallery.delete',$value->id)}}' method='post'><input type='hidden' name='_method' value='delete'><input type='hidden' name='_token' value='{{csrf_token()}}'><button type='button' onclick='deleteFunction();' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button>

                                            </form>

                                     

                                  </td> 

                                </tr>



                              @endforeach  

                                

                              

                              

                            </tbody>

                            <tfoot>

                            <tr>

                              <th>SrNo.</th>

                              <th>Product Images</th>

                              <th>Manage</th>

                            </tr>

                            </tfoot>

                          </table>

                            

                        </div>

                        <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back To Products</a>

                    </div>





                    











                    



                </div>  

                     

            </div>

      </div>

    </div>

  </div>







 

</section>

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

  margin: 10px 10px 0 0;

}

.remove {

  display: block;

  background: #444;

  border: 1px solid black;

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



  function deleteFunction(){

    if(confirm('Do you really want to Delete?')) {

       $('#delete').submit();

    }



    return false;

  }





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

