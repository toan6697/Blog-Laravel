@extends('layouts.app')

@section('content')

   <!-- kiểm tra các điều kiện để validate -->
    @if($errors->any())
      <div class="alert alert-danger" role="alert">
      	 @foreach($errors->all() as $error)
          <strong>Warning!</strong> {{ $error }} <br>
         @endforeach
      </div>
    @endif
  

    <div class="card">
	  <h5 class="card-header">Form insert new post</h5>
	  <div class="card-body">
	    <form action="{{ route('post-add') }}" method="post" enctype="multipart/form-data" >
	    	<input type="hidden" name="_token" value="{{csrf_token()}}">
	    	<fieldset class="form-group">
	    		<label for="formGroupExampleInput">Title</label>
	    		<input type="text" name="title" class="form-control" placeholder="title">
	    	</fieldset>
	    	<fieldset class="form-group">
	    		<label for="formGroupExampleInput2">Featured</label>
	    		<input type="file" class="form-control" name="featured" placeholder="file">
	    	</fieldset>
	    	<fieldset class="form-group">
	    		<label for="formGroupExampleInput2">Category</label>
	    		<select name="category_id" id="">
	    			<option value="">Chọn category</option>
	    			@foreach($kq as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
	    			@endforeach
	    		</select>
	    	</fieldset>
	    	<fieldset class="form-group">
	    		<label for="formGroupExampleInput2">Select tag</label><br>
	    		@foreach($kq1 as $key => $value)
                  <input type="checkbox" name="tag_id[]" value="{{$value->id}}"> {{ $value->tag }}<br>
	    		@endforeach
	    		
	    	</fieldset>
	    	<fieldset class="form-group">
	    		<label for="formGroupExampleInput2">Content</label><br>
	    		<textarea name="content" id="content"></textarea>
	    		<script>
	    			CKEDITOR.replace('content');
	    			CKEDITOR.config.allowedContent = true;
	    		</script>
				
	    	</fieldset>
	    	<fieldset class="form-group">
	    		<div class="text-center">
	    		   <button class="btn btn-primary">Submit</button>
	    		</div>
	    	</fieldset>
	    	
	    </form>
	  </div>
	</div>
    
@endsection
