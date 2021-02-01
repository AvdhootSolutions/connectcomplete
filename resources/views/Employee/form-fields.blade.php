                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter  Name"  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email Address" value="{{ isset($data['user']->email ) ? $data['user']->email : old('email') }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" value="{{ isset($data['user']->password ) ? $data['user']->password : old('password') }}">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="text" name="confirm_password" class="form-control" id="exampleInputEmail1" placeholder="Enter Confirm Password" value="{{ isset($data['user']->confirm_password ) ? $data['user']->confirm_password : old('confirm_password') }}">
                  </div>

                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Designation</label>
                    <input type="text" name="designation" class="form-control" id="exampleInputEmail1" placeholder="Enter Designation" value="{{ isset($data['user']->designation ) ? $data['user']->designation : old('designation') }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile Number</label>
                    <input type="text" name="mobile_number" class="form-control" id="exampleInputEmail1" placeholder="Enter Mobile Number" value="{{ isset($data['user']->mobile_number ) ? $data['user']->mobile_number : old('mobile_number') }}">
                  </div>
                  
                  

                  <div class="form-group">
                    <label for="exampleInputEmail1">Area Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Area Name" value="{{ isset($data['areas']->name ) ? $data['areas']->name : old('name') }}">
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
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                   @if(isset($data['user']->profile_image))
                    <img id="blah" height="100" width="100" src="{{asset('public/profilepic/'.$data['user']->profile_image)}}" alt="your image" />
                    @else
                    <img id="blah" height="100" width="100" src="#" alt="your image" />
                    @endif