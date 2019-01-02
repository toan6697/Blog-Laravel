@extends('layouts.app')

@section('content')
  <form class="form-inline" method="post" action="{{ route('tag-add') }}">
  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  	<div class="form-group">
  		<label for="exampleInputName2">Name tag</label>
  		<input type="text" class="form-control" name="name" id="exampleInputName2" placeholder="name tag">
  	</div>
  	<button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection