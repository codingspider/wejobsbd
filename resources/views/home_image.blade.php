@extends('layouts.dashboard')
@section('content')

<form action="{{ URL::to('/home/page/image/submit') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="form-group">
    <label for="exampleFormControlFile1"> file input</label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
  </div>
  <div class="form-group">

    <input type="submit" class="form-control btn btn-success" id="exampleFormControlFile1">
  </div>
</form>

@endsection
