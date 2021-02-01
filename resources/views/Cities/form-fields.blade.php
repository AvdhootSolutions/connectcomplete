                  <div class="form-group">
                    <label for="exampleInputEmail1">State</label>
                     {!! Form::select('state_id', $data['state'], isset($data['selectedState']) ? $data['selectedState'] : '',['class' => 'form-control cselect',   'placeholder' => 'Please Select','id'=>'customer_name'] ) !!}
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">City Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter City Name" value="{{ isset($data['cities']->name ) ? $data['cities']->name : old('name') }}">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Citiy Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="city_image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                   @if(isset($data['cities']->city_image))
                    <img id="blah" height="100" width="100" src="{{asset('public/cities/'.$data['cities']->city_image)}}" alt="your image" />
                    @else
                    <img id="blah" height="100" width="100" src="#" alt="your image" />
                    @endif