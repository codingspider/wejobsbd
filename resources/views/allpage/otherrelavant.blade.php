
        <form action="{{ URL::to('other/relavant/information/update') }}" method="POST">
          <div class="card-body">
            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Carrer Summury </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="career_summery" value="{{ $career_summery->summery}}" name="career_summery">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Special Qualification </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="special_qualification" value="{{ $career_summery->qualification}}" name="special_qualification">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Keyword </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="keyword" name="keyword" value="{{ $career_summery->keywords}}">
                </div>
                <input type="hidden" name="id" value="{{ $career_summery->id }}">
            </div>
            <div class="form-group col-md-6">
                <input class="btn btn-success" type="submit" name="submit" value="Update"></input>
            <button class="delete btn-danger" onclick="window.location.href = '{{ URL::to('/dashboard/otherrelavant/details/delete/'. $career_summery->id )}}'" type="button" style="margin-left:16px;" >Delete Record</button>
            </div>
        </div>
        </form>
  <hr>

