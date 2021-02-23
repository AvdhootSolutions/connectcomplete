 					<div class="form-group">
                        <label for="exampleInputEmail1">Page Name</label>
                        <input type="text" name="page" class="form-control" id="exampleInputEmail1" placeholder="Enter  page Name" value="{{ isset($data['pagecontent']->page ) ? $data['pagecontent']->page : old('page') }}" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)">
	                </div>
	                <div class="form-group">
                        <label for="exampleInputEmail1">Slug </label>
                        <input type="text" name="slug" class="form-control"   placeholder="Enter  page Name" value="{{ isset($data['pagecontent']->slug ) ? $data['pagecontent']->slug : old('slug') }}" id="slug-text" readonly="readonly" >
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Email</label>
	                    <textarea name="contents" id="content">
			              {{ isset($data['pagecontent']->contents ) ? $data['pagecontent']->contents : old('contents') }}  
			            </textarea>
	                </div>