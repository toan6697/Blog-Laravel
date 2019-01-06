@extends('layouts.app')

@section('content')

    @if($errors->any())
      <div class="alert alert-danger" role="alert">
      	 @foreach($errors->all() as $error)
          <strong>Warning!</strong> {{ $error }} <br>
         @endforeach
      </div>
    @endif

  <form action="{{route('profile-update')}}" method="post" enctype="multipart/form-data">
  	<input type="hidden" name="_token" value="{{csrf_token()}}">
  	<fieldset class="form-group">
  		<label for="formGroupExampleInput">Username</label>
  		<input type="text" class="form-control" name="username" placeholder="username" value="{{ Auth::user()->name }}">
  	</fieldset>
  	<fieldset class="form-group">
  		<label for="formGroupExampleInput2">Email</label>
  		<input type="text" name="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}">
  	</fieldset>
  	<fieldset class="form-group">
  		<label for="formGroupExampleInput2">Password mới</label>
  		<input type="password" class="form-control" placeholder="password" name="password" >
  	</fieldset>
    <fieldset class="form-group">
      <label for="formGroupExampleInput2">Avatar mới</label>
      <input type="file" class="form-control" placeholder="upload avatar" name="avatar" value="{{ $kq[0]->avatar }}">
    </fieldset>
    <fieldset class="form-group">
      <label for="formGroupExampleInput">facebook</label>
      <input type="text" class="form-control" name="facebook" placeholder="facebook" value="{{ $kq[0]->facebook }}">
    </fieldset>
    <fieldset class="form-group">
      <label for="formGroupExampleInput">Youtube</label>
      <input type="text" class="form-control" name="youtube" placeholder="username" value="{{ $kq[0]->youtube }}">
    </fieldset>
    <fieldset class="form-group">
      <label for="formGroupExampleInput">About</label><br>
      <textarea name="about" cols="101" rows="10" > {{ $kq[0]->about }}</textarea>
    </fieldset>
  	<fieldset class="form-group">
  		<button type="submit" class="btn btn-info">Submit</button>
  	</fieldset>
  </form>

@endsection