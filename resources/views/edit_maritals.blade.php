@extends('layouts.dashboard')

@section('content')
<form method="POST" action="{{ URL::to('/edit/marital/submit/form') }}">
    {{ csrf_field()}}
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Marital</label>
    <div class="col-sm-10">
      <input type="text" name="marital" class="form-control-plaintext" id="staticEmail" value="{{$data->name}}">
    </div>
  </div>
  <input type="hidden" name="id" value="{{ $data->id }}">
  <div class="form-group row">
  
    <div class="col-md-6">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
<br>



@endsection