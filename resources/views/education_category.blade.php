@extends('layouts.dashboard')

@section('content')
<form method="POST" action="{{ URL::to('/add/education/level/submit/form') }}">
    {{ csrf_field()}}
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Level of Education</label>
    <div class="col-sm-10">
      <input type="text" name="education_level" class="form-control-plaintext" id="staticEmail" placeholder="Education Level">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Result</label>
    <div class="col-sm-10">
      <input type="text" name="result" class="form-control-plaintext" id="staticEmail" placeholder="Result">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Board</label>
    <div class="col-sm-10">
      <input type="text" name="board" class="form-control-plaintext" id="staticEmail" placeholder="Board">
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
      <th scope="col">Education Level </th>
      <th scope="col">Result </th>
      <th scope="col">Board </th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($data as $element)
           <tr>
            <th scope="row">{{$element->education_level}}</th>
            <td>{{$element->result}}</td>
            <td>{{$element->board }}</td>
            <td><button type="submit" onclick="window.location = '{{ URL::to('/gender/edit',$element->id)}}'" class="btn btn-info">Edit</button> <button type="submit"  onclick="window.location = '{{ URL::to('/gender/delete',$element->id)}}'"  class="btn btn-danger">Delete</button></td>
    </tr>
    @endforeach

  </tbody>
</table>


@endsection