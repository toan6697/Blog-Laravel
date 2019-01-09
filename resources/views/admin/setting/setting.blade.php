@extends('layouts.app')

@section('content')

    @if($errors->any())
      <div class="alert alert-danger" role="alert">
      	 @foreach($errors->all() as $error)
          <strong>Warning!</strong> {{ $error }} <br>
         @endforeach
      </div>
    @endif

    <div class="card">
    <h5 class="card-header">Form update setting</h5>
    <div class="card-body">
      <form action="{{ route('setting-update') }}" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="{{ $kq[0]->id }}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <fieldset class="form-group">
          <label for="formGroupExampleInput">Site name</label>
          <input type="text" name="site_name" class="form-control" placeholder="site_name" value="{{ $kq[0]->site_name }}">
        </fieldset>
        <fieldset class="form-group">
          <label for="formGroupExampleInput2">Address</label>
          <input type="text" class="form-control" name="address" placeholder="address" value="{{ $kq[0]->address }}">
        </fieldset>
        <fieldset class="form-group">
          <label for="formGroupExampleInput2">Contact number</label>
          <input type="text" class="form-control" name="contact_number" placeholder="contact_number" value="{{ $kq[0]->contact_number }}">
        </fieldset>
        <fieldset class="form-group">
          <label for="formGroupExampleInput2">contact email</label>
          <input type="email" class="form-control" name="contact_email" placeholder="contact email" value="{{ $kq[0]->contact_email }}">
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