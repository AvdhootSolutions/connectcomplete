                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" value="{{ isset($data['blogs']->title ) ? $data['blogs']->title : old('title') }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Author</label>
                    <input type="text" name="author"  class="form-control" id="exampleInputPassword1" placeholder="Author"  value="{{ isset($data['blogs']->author ) ? $data['blogs']->author : old('author') }}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" class="form-control">{{ isset($data['blogs']->description ) ? $data['blogs']->description : old('description') }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Media Type</label>
                    <select name="media_type" class="form-control" onchange="mediaType(this)">
                      <option value="" >Select</option>
                      <option value="1" @if(isset($data['blogs']->media_type) &&  $data['blogs']->media_type==1) selected @endif>Image</option>
                      <option value="2" @if(isset($data['blogs']->media_type) &&  $data['blogs']->media_type==2) selected @endif>Video</option>
                    </select>
                  </div>
                  <div class="form-group" id="blog_image" >
                    <label for="exampleInputFile">blogs Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="blog_image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                       
                    </div>
                    @if(isset($data['blogs']->blog_image))
                    <img id="blah" height="100" width="100" src="{{asset('public/blogs/'.$data['blogs']->blog_image)}}" alt="your image" />
                    @else
                    <img id="blah" height="100" width="100" src="#" alt="your image" />
                    @endif
                  </div>
                  <div class="form-group" id="video_url">
                    <label for="exampleInputFile">Video URL</label>
                    <input type="text" name="video_url"  class="form-control"  value="{{ isset($data['blogs']->video_url ) ? $data['blogs']->video_url : old('video_url') }}">
                  </div>






                  