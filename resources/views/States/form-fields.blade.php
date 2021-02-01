                  <div class="form-group">
                    <label for="exampleInputEmail1">State Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter State Name" value="{{ isset($data['states']->name ) ? $data['states']->name : old('name') }}">
                  </div>
                   
                   