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
                    <input type="text" name="price" onkeypress="return isNumber(event)" class="form-control" id="exampleInputPassword1" placeholder="Price"  value="{{ isset($data['childcategory']->price ) ? $data['childcategory']->price : old('price') }}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Remarks</label>
                    <textarea name="remarks" class="form-control">{{ isset($data['childcategory']->remarks ) ? $data['childcategory']->remarks : old('remarks') }}</textarea>
                     
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Is Featured ?</label>
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" value="1" name="is_featured" @if(isset($data['childcategory']->is_featured) && $data['childcategory']->is_featured =="1") 'checked' @endif >
                        <label for="radioPrimary1">Yes
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" value="0" name="is_featured" @if(isset($data['childcategory']->is_featured) && $data['childcategory']->is_featured =="0") 'checked' @endif>
                        <label for="radioPrimary2">No
                        </label>
                      </div>
                    
                     
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Is Trending ?</label>
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary3" value="1" name="is_trending" @if(isset($data['childcategory']->is_trending) && $data['childcategory']->is_trending =="1") 'checked' @endif>
                        <label for="radioPrimary3">Yes
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary4" value="0" name="is_trending" @if(isset($data['childcategory']->is_trending) && $data['childcategory']->is_trending =="0") 'checked' @endif>
                        <label for="radioPrimary4">No
                        </label>
                      </div>
                     
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select Working Stage</label>
                    <select name="working_stage" id="working_stage" onchange="workingStage(this);" class="form-control">
                      <option value="">Select Option</option>
                      <option value="1" @if(isset($data['childcategory']->working_stage) && $data['childcategory']->working_stage ==1) selected="selected" @endif>Executive</option>
                      <option value="0" @if(isset($data['childcategory']->working_stage) && $data['childcategory']->working_stage==0)selected="selected" @endif>Crew</option>
                    </select>
                     
                  </div>
                  <div class="form-group" id="service_cost" @if(isset($data['childcategory']->working_stage) && $data['childcategory']->working_stage==0) style="display:block;" @endif>
                  
                    <label for="exampleInputPassword1">Service Cost </label>
                    <input type="text" name="service_cost"  class="form-control" id="exampleInputPassword1" placeholder="Service Cost "  value="{{ isset($data['childcategory']->service_cost ) ? $data['childcategory']->service_cost : old('service_cost') }}" >
                     
                  </div>
                  <div class="form-group" id="minimum_cost" @if(isset($data['childcategory']->working_stage) && $data['childcategory']->working_stage==1) style="display:block;" @endif>
                    <label for="exampleInputPassword1">Minimum Cost</label>
                    <input type="text" name="minimum_cost"  class="form-control" id="exampleInputPassword1" placeholder="Minimum Cost"  value="{{ isset($data['childcategory']->minimum_cost ) ? $data['childcategory']->minimum_cost : old('minimum_cost') }}" >
                     
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

