@extends('layouts.app')

@section('content')

    @if($errors->any())
      <div class="alert alert-danger" role="alert">
      	 @foreach($errors->all() as $error)
          <strong>Warning!</strong> {{ $error }} <br>
         @endforeach
      </div>
    @endif

  <form action="{{route('user-add')}}" method="post">
  	<input type="hidden" name="_token" value="{{csrf_token()}}">
  	<fieldset class="form-group">
  		<label for="formGroupExampleInput">Name</label>
  		<input type="text" class="form-control" name="name" placeholder="Name">
  	</fieldset>
  	<fieldset class="form-group">
  		<label for="formGroupExampleInput2">Email</label>
  		<input type="text" name="email" class="form-control" placeholder="Email">
  	</fieldset>
  	<fieldset class="form-group">
  		<label for="formGroupExampleInput2">Password</label>
  		<input type="password" class="form-control" placeholder="password" name="password">
  	</fieldset>
   
  	<fieldset class="form-group">
  		<button type="submit" class="btn btn-info">Submit</button>
  	</fieldset>
  </form>

@endsection