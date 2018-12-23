@extends('layouts.app')

@section('content')
   
 @if($errors->any())
   <div class="alert alert-danger alert-dismissible fade show notify" role="alert">
   	@foreach($errors->all() as $error)
	  <strong>Danger!</strong> {{ $error }}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	@endforeach  
	</div>
 @endif 

 <form method="post" action="{{ route('category-add') }}">
 	<input type="hidden" name="_token" value="{{ csrf_token() }}">
 	<fieldset class="form-group" >
 		<label for="formGroupExampleInput">Name</label>
 		<input type="text" class="form-control" name="name" placeholder="create a new category">
 	</fieldset>
 	<fieldset class="form-group">
 		<button type="submit" class="btn btn-primary">Submit</button>
 	</fieldset>
 </form>
 <script>
 	function bienMat() {
 		var thongBao=document.getElementsByClassName('notify');
 		thongBao[0].classList.remove('show');
 	}
 	setTimeout(function(){ bienMat() }, 3000);
 </script>
@endsection