@extends('layouts.app')

@section('content')
  <table class="table table-inverse">
  	<thead>
  		<tr>
  			<th>ID</th>
  			<th>Tag</th>
  			<th>Action</th>
  		</tr>
  	</thead>
  	<tbody>
  		@foreach($kq as $k => $v)
  		<tr>
  			<td>{{ $v ->id }}</td>
  			<td>{{ $v->tag }}</td>
  			<td>
  				<a href="{{route('tag-delete',['id'=>$v->id])}}" class="btn btn-danger">Delete</a>
   				<a href="{{route('tag-edit',['id'=>$v->id])}}" class="btn btn-info">Edit</a>
  			</td>
  		</tr>
  		@endforeach
  	</tbody>
  </table>
@endsection