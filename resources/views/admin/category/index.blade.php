@extends('layouts.app')

@section('content')
   
	<!-- Modal -->
	<div class="modal fade form-edit" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Form edit</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	          <form>
	          	<fieldset class="form-group">
	          		<input type="hidden" id="id_cate" name="id">
	          		<label for="formGroupExampleInput">Name</label>
	          		<input type="text" class="form-control" id="name_cate" placeholder="Name category">
	          	</fieldset>
	          </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="save()">Save</button>
	        
	      </div>
	    </div>
	  </div>
	</div>

   <div class="card">
	  <h5 class="card-header">Lisst category</h5>
	  <div class="card-body">
	    <table class="table table-inverse">
	    	<thead>
	    		<tr>
	    			<th>Id</th>
	    			<th>name</th>
	    			<th>Action</th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		@foreach($kq as $k => $v)
	    		<tr>
	    		   <td>{{  $v->id }}</td>
	    		   <td>{{ $v->name }}</td>
	    		   <td>
	    		   	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="getIdToEdit(this)">
					 <i class="fas fa-edit"></i>
					</button>
    				<button type="button" class="btn btn-danger" onclick="getId(this)"><i class="far fa-trash-alt"></i></button>
	    		   </td>
	    		</tr>
	    		@endforeach
	    	</tbody>
	    </table>
	  </div>
	</div>
	<script>

	    function getId(id) {
			 var idCategory = id.parentElement.previousElementSibling.previousElementSibling.innerText;
			  $.ajax({
			  	url: '{{ route("category-delete") }}',
			  	headers: {
				  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
			  	type: 'post',
			  	dataType: 'json',
			  	data: {
			  		_token : $('meta[name="csrf-token"]').attr('content'), 
			  		id: idCategory
			  	},success:function(res) {
			  		if(res.status){
                       rendTableCategory(res.kq);
                       toastr.success('Xóa thành công');
			  		}
			  	},error:function(res){
                    console.log('Ajax call fail');
			  	}
			  })
			  
		}

		function getIdToEdit(id) {
			 var idCategory = id.parentElement.previousElementSibling.previousElementSibling.innerText;
			 var name_category=document.getElementById('name_cate');
			  $.ajax({
			  	url: '{{ route("category-edit") }}',
			  	headers: {
				  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
			  	type: 'post',
			  	dataType: 'json',
			  	data: {
			  		_token : $('meta[name="csrf-token"]').attr('content'), 
			  		id: idCategory
			  	},success:function(res) {
			  		if(res.status){
                       name_category.value=res.kq.name;
                       document.getElementById('id_cate').value=res.kq.id;
			  		}
			  	},error:function(res){
                    console.log('Ajax call fail');
			  	}
			  })
			  
		}
		function save(){
            var _id=document.getElementById('id_cate').value;
            var _name=document.getElementById('name_cate').value;
            
            $.ajax({
            	url: '{{ route("category-update") }}',
            	headers: {
				  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
            	type: 'post',
            	dataType: 'json',
            	data: {
            		_token : $('meta[name="csrf-token"]').attr('content'),
            		id     : _id,
            		name   :_name
            	},
            	success:function(res) {
			  		if(res.status){
                       rendTableCategory(res.kq);
                       toastr.success('Update thành công');
			  		}
			  	},error:function(res){
                    console.log('Ajax call fail');
			  	}
            })
		} 
		      
		function rendTableCategory(list){
			var html="";
           for (var i = 0; i < list.length; i++) {
           	    html +="<tr>";
           	    html +="<td>"+list[i].id+"</td>";
           	    html +="<td>"+list[i].name+"</td>";
           	    html +='<td>'+
    				'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="getIdToEdit(this)">'+
					 '<i class="fas fa-edit"></i>'+
    				'<button type="button" class="btn btn-danger" onclick="getId(this)"><i class="far fa-trash-alt"></i></button>'+
	    		   '</td>';
           }
           var data=document.getElementsByTagName('tbody');
           data[0].innerHTML=html;
		}       
		
	</script>
@endsection