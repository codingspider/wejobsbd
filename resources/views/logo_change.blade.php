@extends('layouts.dashboard')

@section('content')
<form method="POST" action="{{ URL::to('/update/logo/submit/form') }}" enctype="multipart/form-data">
    {{ csrf_field()}}
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Select your website logo</label>
    <div class="col-sm-10">
      <input type="file" name="logo" class="form-control-plaintext">
    </div>
  </div>
  <div class="form-group row">

    <div class="col-md-6">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
<br>



@endsection
