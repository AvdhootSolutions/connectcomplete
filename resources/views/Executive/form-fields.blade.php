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
                      @if($data['action']=="create")
                      <div class="form-group">
                        <label for="exampleInputEmail1">Confirm Password</label>
                        <input type="text" name="confirm_password" class="form-control" id="exampleInputEmail1" placeholder="Enter Confirm Password" value="{{ isset($data['user']->confirm_password ) ? $data['user']->confirm_password : old('confirm_password') }}">
                      </div>
                      @endif
                      @if($data['action']=="create")

                        <div class="form-group">
                          <label for="exampleInputEmail1">Area Name</label>
                          <select name="areas[]" id="area_id" class="form-control areas" multiple="multiple">
                              @foreach($data['areas'] as $key => $area)
                             <option value="{{$area->id}}" >{{$area->name}}</option>
                            @endforeach 
                          </select>
                           
                        </div>
                        @else
                        <div class="form-group">
                          <label for="exampleInputEmail1">Area Name</label>
                          <select name="areas[]" id="area_id" class="form-control areas" multiple="multiple">
                            @foreach($data['areas'] as $key => $area)
                             <option value="{{$area->id}}" @if(in_array($area->id,$data['executiveAreas'])) selected="selected"  @endif>{{$area->name}}</option>
                            @endforeach 
                          </select>
                           
                        </div>
                        @endif
                        <div class="form-group">
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


                    </div>

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
                        <label for="exampleInputEmail1">Experience</label>
                        <input type="text" name="experience" class="form-control" id="exampleInputEmail1" placeholder="Enter Experience" value="{{ isset($data['user']->experience ) ? $data['user']->experience : old('experience') }}">
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
                        @if(isset($data['user']->profile_pic))
                        <img id="blah" height="100" width="100" src="{{asset('public/executiveprofilepic/'.$data['user']->profile_pic)}}" alt="your image" />
                        @else
                        <img id="blah" height="100" width="100" src="#" alt="your image" />
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
                        @if(isset($data['user']->goverment_proff))
                        <img id="blah" height="100" width="100" src="{{asset('public/executivegovementproff/'.$data['user']->goverment_proff)}}" alt="your image" />
                        @else
                        <img id="blah" height="100" width="100" src="#" alt="your image" />
                        @endif

                        <!--Executive -->
                        <div class="form-group">
                          <label for="exampleInputFile">Police Verification</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input name="police_verification" type="file" class="custom-file-input" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                           <!--  <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                            </div> -->
                          </div>
                        </div>
                        @if(isset($data['user']->police_verification))
                        <img id="blah" height="100" width="100" src="{{asset('public/executivePoliceproff/'.$data['user']->police_verification)}}" alt="your image" />
                        @else
                        <img id="blah" height="100" width="100" src="#" alt="your image" />
                        @endif




                    </div>
                  </div>










                  
                  

                  

                  
                 
                  
                  

                  
                  