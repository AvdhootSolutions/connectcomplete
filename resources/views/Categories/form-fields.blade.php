<div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name" value="{{ isset($data['category']->category_name ) ? $data['category']->category_name : old('category_name') }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sorting Number</label>
                    <input type="text" name="sorting_number"  class="form-control" id="exampleInputPassword1" placeholder="Sorting Number"  value="{{ isset($data['category']->sorting_number ) ? $data['category']->sorting_number : old('sorting_number') }}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Remarks</label>
                    <textarea name="remarks" class="form-control">{{ isset($data['category']->remarks ) ? $data['category']->remarks : old('remarks') }}</textarea>
                     
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Category Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="category_image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                   @if(isset($data['category']->category_image))
                    <img id="blah" height="100" width="100" src="{{asset('public/category/'.$data['category']->category_image)}}" alt="your image" />
                    @else
                    <img id="blah" height="100" width="100" src="#" alt="your image" />
                    @endif