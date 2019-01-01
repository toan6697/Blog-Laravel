@extends('layouts.app')

@section('content')
   <div class="card">
   	<div class="card-header">
   		List post
   	</div>
   	<div class="card-block">
   		<table class="table table-inverse">
   			<thead>
   				<tr>
   					<th>title</th>
   					<th>Image</th>
   					<th>category</th>
   					<th>Action</th>
   				</tr>
   			</thead>
   			<tbody>
   				@foreach($kq1 as $key => $value )
   				<tr>
   					<td>{{$value['title']}}</td>
   					<td>
   						<img src="{{$value['featured']}}" alt="" width="70px" height="70px">
   					</td>
   					<td>
   						{{$kq2[$value['category_id']]['name']}}
   					</td>
   					<td>
   						<a href="{{route('post-delete',['id'=>$value['id']])}}" class="btn btn-danger">Delete</a>
   						<a href="{{route('post-edit',['id'=>$value['id']])}}" class="btn btn-info">Edit</a>
   					</td>
   				</tr>
   				@endforeach
   			</tbody>
   		</table>
   	</div>
   </div>
@endsection