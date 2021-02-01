                  <div class="form-group">
                    <label for="exampleInputEmail1">State</label>
                     {!! Form::select('state_id', $data['state'], isset($data['selectedState']) ? $data['selectedState'] : '',['class' => 'form-control cselect',   'placeholder' => 'Please Select','id'=>'state_id'] ) !!}
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">City</label>
                     {!! Form::select('city_id', $data['city'], isset($data['selectedCity']) ? $data['selectedCity'] : '',['class' => 'form-control sselect',   'placeholder' => 'Please Select','id'=>'city_id'] ) !!}
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Area Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Area Name" value="{{ isset($data['areas']->name ) ? $data['areas']->name : old('name') }}">
                  </div>
                   
                   
                  
                  