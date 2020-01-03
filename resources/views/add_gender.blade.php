@extends('layouts.dashboard')

@section('content')
<form method="POST" action="{{ URL::to('/add/gender/submit/form') }}">
    {{ csrf_field()}}
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Gender</label>
    <div class="col-sm-10">
      <input type="text" name="gender" class="form-control-plaintext" id="staticEmail" placeholder="Gender">
    </div>
  </div>
  <div class="form-group row">
  
    <div class="col-md-6">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
<br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($data as $element)
           <tr>
      <th scope="row">{{$element->id}}</th>
      <td>{{$element->name}}</td>
      <td><button type="submit" onclick="window.location = '{{ URL::to('/gender/edit',$element->id)}}'" class="btn btn-info">Edit</button> <button type="submit"  onclick="window.location = '{{ URL::to('/gender/delete',$element->id)}}'"  class="btn btn-danger">Delete</button></td>
    </tr>
    @endforeach

  </tbody>
</table>


@endsection