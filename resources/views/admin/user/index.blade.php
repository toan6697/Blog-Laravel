@extends('layouts.app')

@section('content')
  <table class="table table-inverse">
    <thead>
      <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Name</th>
        <th>Permission</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($kq as $key => $value)
        <tr>
          <td>
            {{ $value->id }}
          </td>
          <td>
            <img src="{{ $value->profile->avatar }}" alt="" width="90px" height="90px">
          </td>
          <td>{{ $value->name }}</td>
          <td>
            @if($value->admin==0)
              <button class="btn btn-success" onclick="getIdUser(this)">Admin</button>
            @else
              <button class="btn btn-info" onclick="getIdUser(this)">delete admin</button> 
            @endif    
          </td>
          <td>
            <a href="{{route('user-delete',['id'=>$value->id])}}" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <script>
    function getIdUser(id) {
      var id = id.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerText;
      $.ajax({
              url: '{{ route("user-admin") }}',
              headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
              type: 'get',
              dataType: 'json',
              data: {
                _token : $('meta[name="csrf-token"]').attr('content'),
                id     :  id
              },
              success:function(res) {
                if(res.status){
                    window.location.href = '{{ route("user-index") }}';
                }
              },error:function(res){
                 console.log('Ajax call fail');
              }
            })
    }
  </script>
@endsection