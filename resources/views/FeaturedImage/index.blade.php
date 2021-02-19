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
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
             
            <!-- /.card -->
              @include('layouts.errorMessage')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$data['page_title']}}</h3>
                <a href="{{route('featuredimages.create')}}" style="float: right;" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>&nbsp;&nbsp;Create</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.no</th>
                    <th>Image</th>
                    <th>Is Featured</th>
                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <style type="text/css">.flex-row{display: flex;}</style>
                  <tbody>
                  @if($data['featuredimages']!="")
                  @foreach($data['featuredimages'] as $key=>$featuredimages) 
                  <tr>
                    <td>{{$key+1}}</td>
                    <td><img src="{{asset('public/featuredImage/'.$featuredimages->featured_image)}}" height="70" width="100"></td>
                    <td>@if($featuredimages->is_featured==1) Yes @else No @endif</td>
                    
                    <td class="project-actions text-right flex-row"><!-- <a style="margin-right: 5px;" href="{{ route('featuredimages.show',$featuredimages->id) }}" class="btn btn-xs btn-success"><i class="fas fa-eye"></i></a> -->
                      
                      <a style="margin-right: 5px;" href="{{ route('featuredimages.edit',$featuredimages->id) }}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>
                      
                      <form action="{{ url('/featuredimages', ['id' => $featuredimages->id]) }}" method="post" id="delete_form{{$featuredimages->id}}">
                    <button  data-toggle="modal" data-target="#modal-danger{{ $featuredimages->id}}"  class="btn btn-danger btn-xs" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        @method('delete')
                        @csrf
                    </form>
                    </td>
                     <!-- Delete Modal -->
                    <div class="modal modal-danger fade" id="modal-danger{{ $featuredimages->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Confirm Delete Action ?</h4>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure you want to delete this Record ? </p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" onclick="deleteItem('{{ $featuredimages->id }}')">Ok</button>
                            <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- Delete Modal Ends-->
                  </tr>
                  @endforeach
                  @endif
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>Sr.no</th>
                    <th>Image</th>
                    <th>Is Featured</th>
                    
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
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
<script>
  function deleteItem(id)
{
       
      $('#delete_form'+id)[0].submit();  
       $('#modal-danger'+id).modal('hide');
       
}

  $(function () {
     
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
