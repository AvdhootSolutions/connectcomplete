                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Select User Type :- </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <div class="icheck-primary d-inline">
                             
                            <input type="radio" id="radioPrimary1"  value="0" name="user_type" @if(isset($data['user']->user_type) && $data['user']->user_type==0) checked @endif >
                            <label for="radioPrimary1">Corporate
                            </label>
                          </div>
                          <div class="icheck-primary d-inline">
                            <input type="radio" id="radioPrimary2" value="1" name="user_type"  @if(isset($data['user']->user_type) && $data['user']->user_type==1) checked @endif >
                            <label for="radioPrimary2">Individual
                            </label>
                          </div>
                    </div>
                   </div>
                 </div>
                 <div class="row">
                  <div class="col-md-6">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter  Name" value="{{ isset($data['user']->name ) ? $data['user']->name : old('name') }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email Address" value="{{ isset($data['user']->email ) ? $data['user']->email : old('email') }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" value="">
                    </div>
                    <div class="form-group" id="assign_area">
                      <label>Already Assigned Area are as Follows</label>
                      <ul style="display: inline-flex;text-decoration: none;list-style-type: none;" id="list_area" >
                        @if(isset($data['assignedAreas']))
                          @foreach($data['assignedAreas'] as $key=>$area)
                            <li style="padding:0 15px;background-color:#007bff;border-color: #006fe6;color: #fff;margin-right:5px;">{{$area->name}}</li>
                          @endforeach
                        @endif
                      </ul>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Remarks</label>
                      <textarea name="remarks" class="form-control">{{ isset($data['user']->remarks ) ? $data['user']->remarks : old('user') }}</textarea>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputFile">Profile Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="profile_image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <!-- <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div> -->
                    </div>
                  </div>
                   @if(isset($data['user']->profile_image))
                    <img id="blah" height="100" width="100" src="{{asset('public/profilepic/'.$data['user']->profile_image)}}" alt="your image" />
                    @else
                    <img id="blah" height="100" width="100" src="#" alt="your image" />
                    @endif
                  
                  </div><!--col-md-6 ends-->
                   

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Designation</label>
                      <input type="text" name="designation" class="form-control" id="exampleInputEmail1" placeholder="Enter Designation" value="{{ isset($data['user']->designation ) ? $data['user']->designation : old('designation') }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Mobile Number</label>
                      <input type="text" name="mobile_number" class="form-control" id="exampleInputEmail1" placeholder="Enter Mobile Number" value="{{ isset($data['user']->mobile_number ) ? $data['user']->mobile_number : old('mobile_number') }}">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">State</label>
                       {!! Form::select('state_id', $data['state'], isset($data['selectedState']) ? $data['selectedState'] : '',['class' => 'form-control cselect',   'placeholder' => 'Please Select','id'=>'state_id'] ) !!}
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">City</label>
                       {!! Form::select('city_id', $data['city'], isset($data['selectedCity']) ? $data['selectedCity'] : '',['class' => 'form-control sselect',   'placeholder' => 'Please Select','id'=>'city_id'] ) !!}
                    </div>
                    @if($data['action']=="create")
                    <div class="form-group">
                      <label for="exampleInputEmail1">Area Name</label>
                      <select name="areas[]" id="area_id" class="form-control areas" multiple="multiple">
                      </select>
                    </div>
                    @else
                    <div class="form-group">
                      <label for="exampleInputEmail1">Area Name</label>
                      <select name="areas[]" id="area_id" class="form-control areas" multiple="multiple">
                        @foreach($data['areas'] as $key => $area)
                         <option value="{{$area->id}}" @if(in_array($area->id,$data['userAreas'])) selected="selected"  @endif>{{$area->name}}</option>
                        @endforeach 
                      </select>
                    </div>
                    @endif
                    <!--govement_proff--> 
                    <div class="form-group">
                      <label for="exampleInputFile">Goverment Proff</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input name="govement_proff" type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                       <!--  <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div> -->
                      </div>
                    </div>
                    @if(isset($data['user']->govement_proff))
                    <img id="blah" height="100" width="100" src="{{asset('public/govementproff/'.$data['user']->govement_proff)}}" alt="your image" />
                    @else
                    <img id="blah" height="100" width="100" src="#" alt="your image" />
                    @endif

                    
                   </div><!--col-md-6 ends-->
                 </div>
















                  

                   <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="text" name="confirm_password" class="form-control" id="exampleInputEmail1" placeholder="Enter Confirm Password" value="{{ isset($data['user']->confirm_password ) ? $data['user']->confirm_password : old('confirm_password') }}">
                  </div> -->

                  
                  
                  
                  

                  
                 
                  

                  