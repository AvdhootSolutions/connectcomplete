                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                     {!! Form::select('category_id', $data['category'], isset($data['selectedCategory']) ? $data['selectedCategory'] : '',['class' => 'form-control cselect',   'placeholder' => 'Please Select','id'=>'customer_name'] ) !!}
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Subcategory Name</label>
                    <input type="text" name="subcategory_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Subcategory Name" value="{{ isset($data['subcategory']->subcategory_name ) ? $data['subcategory']->subcategory_name : old('subcategory_name') }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sorting Number</label>
                    <input type="text" name="sorting_number"  class="form-control" id="exampleInputPassword1" placeholder="Sorting Number"  value="{{ isset($data['subcategory']->sorting_number ) ? $data['subcategory']->sorting_number : old('sorting_number') }}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Remarks</label>
                    <textarea name="remarks" class="form-control">{{ isset($data['subcategory']->remarks ) ? $data['subcategory']->remarks : old('remarks') }}</textarea>
                     
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Subcategory Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="subcategory_image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                   @if(isset($data['subcategory']->subcategory_image))
                    <img id="blah" height="100" width="100" src="{{asset('public/subcategory/'.$data['subcategory']->subcategory_image)}}" alt="your image" />
                    @else
                    <img id="blah" height="100" width="100" src="#" alt="your image" />
                    @endif