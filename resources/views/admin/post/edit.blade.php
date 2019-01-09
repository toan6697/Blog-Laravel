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
	  <h5 class="card-header">Form edit post</h5>
	  <div class="card-body">
	    <form action="{{ route('post-update') }}" method="post" enctype="multipart/form-data" >
	    	<input type="hidden" name="_token" value="{{csrf_token()}}">
	    	<input type="hidden" name="id" value="{{ $kq['id'] }}">
	    	<fieldset class="form-group">
	    		<label for="formGroupExampleInput">Title</label>
	    		<input type="text" name="title" class="form-control" placeholder="title" value="{{ $kq['title'] }}">
	    	</fieldset>
	    	<fieldset class="form-group">
	    		<label for="formGroupExampleInput2">Featured</label>
	    		<input type="file" class="form-control" name="featured" placeholder="file">
	    	</fieldset>
	    	<fieldset class="form-group">
	    		<label for="formGroupExampleInput2">Category</label>
	    		<select name="category_id" id="">
	    			@foreach($kq2 as $key => $value)
                        <option value="{{ $value['id'] }}" @if($value['id']==$kq['category_id']) {{ 'selected' }} @else @endif  >{{ $value['name'] }}</option>
	    			@endforeach
	    		</select>
	    	</fieldset>
	    	<fieldset class="form-group">
	    		<label for="formGroupExampleInput2">Select tag</label><br>
	    		@foreach($kq3 as $key => $value)
                  <input type="checkbox" name="tag_id[]" value="{{$value['id']}}" @foreach($kq4 as $k => $v )
                         @if($value['id']==$v['id']) {{ 'checked' }}
                         @else
                         @endif
                     @endforeach
                       > {{ $value['tag'] }}<br>
	    		@endforeach
	    	</fieldset>
	    	<fieldset class="form-group">
	    		<label for="formGroupExampleInput2">Content</label><br>
	    		<textarea name="content" id="content">{{ htmlspecialchars_decode($kq['content']) }}</textarea>
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