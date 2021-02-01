                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                     {!! Form::select('category_id', $data['category'], isset($data['selectedCategory']) ? $data['selectedCategory'] : '',['class' => 'form-control cselect','placeholder' => 'Please Select','id'=>'category_id'] ) !!}
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Subcategory Name</label>
                     {!! Form::select('subcategory_id', $data['subcategory'], isset($data['selectedSubCategory']) ? $data['selectedSubCategory'] : '',['class' => 'form-control sselect',   'placeholder' => 'Please Select','id'=>'subcategory'] ) !!}
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Child Category Name</label>
                    <input type="text" name="child_category_name"  class="form-control" id="exampleInputPassword1" placeholder="Child Category Name"  value="{{ isset($data['childcategory']->child_category_name ) ? $data['childcategory']->child_category_name : old('child_category_name') }}" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Sorting Number</label>
                    <input type="text" name="sorting_number"  class="form-control" id="exampleInputPassword1" placeholder="Sorting Number"  value="{{ isset($data['childcategory']->sorting_number ) ? $data['childcategory']->sorting_number : old('sorting_number') }}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" name="price"  class="form-control" id="exampleInputPassword1" placeholder="Price"  value="{{ isset($data['childcategory']->price ) ? $data['childcategory']->price : old('price') }}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Remarks</label>
                    <textarea name="remarks" class="form-control">{{ isset($data['childcategory']->remarks ) ? $data['childcategory']->remarks : old('remarks') }}</textarea>
                     
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Child Category Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="child_category_image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  @if(isset($data['childcategory']->child_category_image))
                  <img id="blah" height="100" width="100" src="{{asset('public/childcategory/'.$data['childcategory']->child_category_image)}}" alt="your image" />
                  @else
                  <img id="blah" height="100" width="100" src="#" alt="your image" />
                  @endif