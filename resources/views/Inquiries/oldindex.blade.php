<div class="container-fluid">
      <div class="row">
          <div class="col-12">

            <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Search</h3>
                    <div class="col-md-12" style="text-align: center">
                          Total {{count($data['inquiries'])}} Records Found                    

                    </div>
                      
                  </div>
                  <!-- /.card-header -->
                  <form action="{{route('searchExecutive')}}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter  Name" value="{{ isset($data['name'] ) ? $data['name'] : old('name') }}">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Mobile Number</label>
                            <input type="text" name="mobile_number" class="form-control" id="exampleInputEmail1" placeholder="Enter  Mobile Number" value="{{ isset($data['mobile_number'] ) ? $data['mobile_number'] : old('mobile_number') }}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Areas</label>
                             <select name="areas[]" class="form-control areas" multiple="multiple">
                                
                             </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                              
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Subcategory</label>
                             
                          </div>
                        </div>
                        
                    </div>  
                  </div> 
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Search</button>  
                    
                  </div>
                </form>
            </div>      



          </div>
      </div>      
      <div class="row">
        <div class="col-12">
           
          @include('layouts.errorMessage')
          @if($data['inquiries']!="")
          @foreach($data['inquiries'] as $key => $inquiry)
          <!-- /.card -->
          <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title">Inquiry Code :- {{$inquiry->code}}</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <h5 class="card-title">Details</h5>
                </div>
                
                <div class="col-md-12">
                      <ul class="nav flex-column">
                        @if($inquiry->inquirydetails!="")
                        @foreach($inquiry->inquirydetails as $key =>$details)
                        <li class="nav-item">
                          
                            Category :- {{$details->category->category_name}} / 
                            Subcategory :- {{$details->subcategory->subcategory_name}} / 
                            Child Category :- {{$details->childcategory->child_category_name}}
                          
                        </li>
                        @endforeach
                        @endif
                        
                      </ul>
                    
                  </div>
                 
                <a href="{{ route('assignexecutiveinquiry',['id'=>$inquiry->id,'cat_id'=>$inquiry->inquirydetails[0]->category->id,'subcat_id'=>$inquiry->inquirydetails[0]->subcategory->id,'area_id'=>$inquiry->area_id]) }}" class="btn btn-primary">Assign Executive</a>
                <a href="#" class="btn btn-primary">Payments</a>
                <a href="{{ route('assigncrewsinquiry',['id'=>$inquiry->id,'cat_id'=>$inquiry->inquirydetails[0]->category->id,'subcat_id'=>$inquiry->inquirydetails[0]->subcategory->id,'area_id'=>$inquiry->area_id]) }}" class="btn btn-primary">Assign Crews</a>
              </div>
            </div>
          <!-- /.card -->
          @endforeach
          @endif


        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>