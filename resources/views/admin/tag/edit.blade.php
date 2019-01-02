@extends('layouts.app')

@section('content')
 @if($errors->any())
      <div class="alert alert-danger" role="alert">
      	 @foreach($errors->all() as $error)
          <strong>Warning!</strong> {{ $error }} <br>
         @endforeach
      </div>
    @endif
<form class="form-inline" method="post" action="{{ route('tag-update') }}">
  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  	<input type="hidden" name="id" value="{{ $kq[0]->id }}">
  	<div class="form-group">
  		<label for="exampleInputName2">Name tag</label>
  		<input type="text" class="form-control" name="name" value="{{ $kq[0]->tag }}" placeholder="name tag">
  	</div>
  	<button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection