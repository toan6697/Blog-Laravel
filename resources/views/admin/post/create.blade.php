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
	    		<label for="formGroupExampleInput2">Content</label>
	    		<input type="text" class="form-control" name="content" placeholder="content">
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