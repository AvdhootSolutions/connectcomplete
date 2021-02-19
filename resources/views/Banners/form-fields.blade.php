                  <div class="form-group">
                    <label for="exampleInputFile">Banner Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="banner_image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                       
                    </div>
                  </div>
                  <div class="form-group"> 
                   @if(isset($data['banners']->banner_image))
                    <img id="blah" height="100" width="100" src="{{asset('public/banners/'.$data['banners']->banner_image)}}" alt="your image" />
                    @else
                    <img id="blah" height="100" width="100" src="#" alt="your image" />
                    @endif
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Is Featured ?</label>
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary3" value="1" name="is_featured" @if(isset($data['banners']->is_featured) && $data['banners']->is_featured =="1") checked @endif>
                        <label for="radioPrimary3">Yes
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary4" value="0" name="is_featured" @if(isset($data['banners']->is_featured) && $data['banners']->is_featured =="0") checked @endif>
                        <label for="radioPrimary4">No
                        </label>
                      </div>
                     
                  </div>