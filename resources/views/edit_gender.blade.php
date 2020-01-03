@extends('layouts.dashboard')

@section('content')
<form method="POST" action="{{ URL::to('/edit/gender/submit/form') }}">
    {{ csrf_field()}}
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Gender</label>
    <div class="col-sm-10">
      <input type="text" name="gender" class="form-control-plaintext" id="staticEmail" value="{{$data->name}}">
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