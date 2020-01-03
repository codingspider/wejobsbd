<div class="row">

<div class="col-md-12">
<section id="tabs">
<div class="container">
<div class="row">
<div>

</div>
<div class="col-md-12 ">
<nav>
<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Personal</a>
<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Education/Training</a>
<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Employment</a>
<a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Other Information</a>
<a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-photo" role="tab" aria-controls="nav-about" aria-selected="false">Photograph</a>
</div>
</nav>
<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
<div id="accordion">
<div class="card">
    <div class="card-header" id="headingOne">
        <h5 class="mb-0">
<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
Personal Details 
</button>
</h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
            <div class="form-row">

                @php $id = Auth::id() ; $personal = DB::table('resumes')->where('user_id',$id)->first(); $personal2 = DB::table('resumes2')->where('user_id',$id)->first(); @endphp
                <div class="form-group col-md-6">
                    <label for="inputEmail4">First Name</label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="first_name" name="first_name" value="{{ ($personal->first_name) ? $personal->first_name : " First Name " }}">

                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Last Name</label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="last_name" name="last_name" value="{{ ($personal->first_name) ? $personal->last_name : " Last Name " }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Father Name</label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="father_name" name="father_name" value="{{ ($personal->father_name) ? $personal->father_name : " Father Name " }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Mother Name</label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="mother_name" name="mother_name" value="{{ ($personal->mother_name) ? $personal->mother_name : " Mother Name " }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="dob">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Gender</label>
                    <select class="mdb-select md-form form-control" id="gender" name="gender">
                        <option value="" disabled selected>Choose your Gender</option>
                        <option value="men">Men</option>
                        <option value="women">Women</option>
                        <option value="others">Other</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nationality</label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="nationality" id="nationality" name="mother_name" value="{{ ($personal->nationality) ? $personal->nationality : " National " }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">National ID No</label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="nid" id="nid" value="{{ ($personal->nid) ? $personal->nid : " NID " }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Maritial Status</label>
                    <select class="mdb-select md-form form-control" id="maritial" name="maritial">
                        <option value="" disabled selected>Choose your Status</option>
                        <option value="Unmarried">Unmarried</option>
                        <option value="Married">Married</option>
                        <option value="Single">Single</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Religion</label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="religion" id="religion" value="{{ ($personal->religion) ? $personal->religion : " Religion " }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Passport Number</label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="pa_number" id="pa_number" value="{{ ($personal->pa_number) ? $personal->pa_number : " Passport Number " }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Passport Issue Date </label>
                    <input type="date" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="pid" id="pid">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Mobile Number 1</label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="mobile1" id="mobile1" value="{{ ($personal->mobile1) ? $personal->mobile1 : " Mobile Number " }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Mobile Number 2</label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="mobile2" id="mobile2" value="{{ ($personal->mobile2) ? $personal->mobile2 : " Mobile Number " }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="email" id="email" value="{{ ($personal->email) ? $personal->email : " Enter your Mail id " }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Alternate Email </label>
                    <input type="email" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="email2" id="email2" value="{{ ($personal->email) ? $personal->email : " Enter your Alternate Mail id " }}">
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" id="personalinformation" class="btn btn-success">Submit</button>
                </div>
                <script>
                    $(document).ready(function() {

                        $('#personalinformation').on('click', function() {
                            var first_name = $('#first_name').val();
                            var last_name = $('#last_name').val();
                            var father_name = $('#father_name').val();
                            var mother_name = $('#mother_name').val();
                            var dob = $('#dob').val();
                            var gender = $('#gender').val();
                            var nationality = $('#nationality').val();
                            var nid = $('#nid').val();
                            var maritial = $('#maritial').val();
                            var religion = $('#religion').val();
                            var pa_number = $('#pa_number').val();
                            var pid = $('#pid').val();
                            var mobile1 = $('#mobile1').val();
                            var mobile2 = $('#mobile2').val();
                            var email = $('#email').val();
                            var email2 = $('#email2').val();
                            if (first_name != "" && email != "") {
                                $.ajax({
                                    url: "/dashboard/personal/details",
                                    type: "POST",
                                    data: {
                                        _token: $("#csrf").val(),
                                        type: 1,
                                        first_name: first_name,
                                        last_name: last_name,
                                        father_name: father_name,
                                        mother_name: mother_name,
                                        dob: dob,
                                        gender: gender,
                                        nationality: nationality,
                                        nid: nid,
                                        maritial: maritial,
                                        pa_number: pa_number,
                                        pid: pid,
                                        mobile1: mobile1,
                                        mobile2: mobile2,
                                        email: email,
                                        email2: email2,
                                        religion: religion,
                                    },
                                    cache: false,
                                    success: function(dataResult) {
                                        console.log(dataResult);
                                        var dataResult = JSON.parse(dataResult);
                                        if (dataResult.statusCode == 200) {
                                            alert("Information Successfully Saved !");
                                        } else if (dataResult.statusCode == 201) {
                                            alert("Error occured !");
                                        }

                                    }
                                });
                            } else {
                                alert('Please fill all the field !');
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
Address Details 
</button>
</h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Present Address </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="present_add" name="present_add" value="{{ ($personal->present_add) ? $personal->present_add : " Present Address " }}">
                </div>
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Permanent Address </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="permanent_add" name="permanent_add" value="{{ ($personal->permanent_add) ? $personal->permanent_add : " Permanent Address " }}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <button type="submit" id="addressdetails" class="btn btn-success">Submit</button>
            </div>
            <script>
                $(document).ready(function() {

                    $('#addressdetails').on('click', function() {
                        var present_add = $('#present_add').val();
                        var permanent_add = $('#permanent_add').val();

                        if (present_add != "" && permanent_add != "") {
                            $.ajax({
                                url: "/dashboard/address/details",
                                type: "POST",
                                data: {
                                    _token: $("#csrf").val(),
                                    type: 1,
                                    present_add: present_add,
                                    permanent_add: permanent_add,

                                },
                                cache: false,
                                success: function(dataResult) {
                                    console.log(dataResult);
                                    var dataResult = JSON.parse(dataResult);
                                    if (dataResult.statusCode == 200) {
                                        alert("Information Successfully Saved !");
                                    } else if (dataResult.statusCode == 201) {
                                        alert("Error occured !");
                                    }

                                }
                            });
                        } else {
                            alert('Please fill all the field !');
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header" id="headingThree">
        <h5 class="mb-0">
<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
Career and Application information
</button>
</h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Present Salary</label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="present_sallary" name="present_sallary" value="{{ ($personal->present_sallary) ? $personal->present_sallary : " Present Salary " }}">
                    </div>
                    <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Expected Salary </label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="exp_sallary" name="exp_sallary" value="{{ ($personal->exp_sallary) ? $personal->exp_sallary : " Expected Salary " }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Looking for (Job Level) </label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="looking_for" name="looking_for" value="{{ ($personal->looking_for) ? $personal->looking_for : " Looking For " }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Available for ( Job Nature ) </label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="job_nature" name="job_nature" value="{{ ($personal->job_nature) ? $personal->job_nature : " Job Nature " }}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" id="careerdetails" class="btn btn-success">Submit</button>
                </div>
                <script>
                    $(document).ready(function() {

                        $('#careerdetails').on('click', function() {
                            var present_sallary = $('#present_sallary').val();
                            var exp_sallary = $('#exp_sallary').val();
                            var looking_for = $('#looking_for').val();
                            var job_nature = $('#job_nature').val();
                            var exp_sallary = $('#exp_sallary').val();

                            if (present_sallary != "" && exp_sallary != "") {
                                $.ajax({
                                    url: "/dashboard/career/application/details",
                                    type: "POST",
                                    data: {
                                        _token: $("#csrf").val(),
                                        type: 1,
                                        present_sallary: present_sallary,
                                        exp_sallary: exp_sallary,
                                        looking_for: looking_for,
                                        job_nature: job_nature,
                                        exp_sallary: exp_sallary,

                                    },
                                    cache: false,
                                    success: function(dataResult) {
                                        console.log(dataResult);
                                        var dataResult = JSON.parse(dataResult);
                                        if (dataResult.statusCode == 200) {
                                            alert("Information Successfully Saved !");
                                        } else if (dataResult.statusCode == 201) {
                                            alert("Error occured !");
                                        }

                                    }
                                });
                            } else {
                                alert('Please fill all the field !');
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header" id="headingThree">
        <h5 class="mb-0">
<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
Preferred Job Categories
</button>
</h5>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Functional </label>
                        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}"> @php $categories = DB::table('categories')->get(); @endphp
                        <select class="mdb-select md-form form-control" id="job_categories" name="job_categories">
                            <option value="" disabled selected>Choose your job categories</option>
                            @foreach ($categories as $element)
                            <option value="{{ $element->category_name }}">{{$element->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Prefferred Job Location </label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="job_location" name="job_location" value="{{ ($personal->job_location) ? $personal->job_location : " Job Location " }}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" id="preferredjobs" class="btn btn-success">Submit</button>
                </div>
                <script>
                    $(document).ready(function() {

                        $('#preferredjobs').on('click', function() {
                            var job_categories = $('#job_categories').val();
                            var job_location = $('#job_location').val();

                            if (job_categories != "" && job_location != "") {
                                $.ajax({
                                    url: "/dashboard/preferred/categories",
                                    type: "POST",
                                    data: {
                                        _token: $("#csrf").val(),
                                        type: 1,
                                        job_categories: job_categories,
                                        job_location: job_location,

                                    },
                                    cache: false,
                                    success: function(dataResult) {
                                        console.log(dataResult);
                                        var dataResult = JSON.parse(dataResult);
                                        if (dataResult.statusCode == 200) {
                                            alert("Information Successfully Saved !");
                                        } else if (dataResult.statusCode == 201) {
                                            alert("Error occured !");
                                        }

                                    }
                                });
                            } else {
                                alert('Please fill all the field !');
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header" id="headingThree">
        <h5 class="mb-0">
<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
Other Relevant information 
</button>
</h5>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Carrer Summury </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="career_summery" name="career_summery" value="{{ ($personal->summery) ? $personal->summery : " Carrer Summury " }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Special Qualification </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="special_qualification" name="special_qualification" value="{{ ($personal->qualification) ? $personal->qualification : " Special Qualification " }}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <button type="submit" id="othersdetails" class="btn btn-success">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
<div class="accordion" id="accordionExample">
<div class="card">
    <div class="card-header" id="headingOne">
        <h2 class="mb-0">
<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
Academic #1
</button>
</h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <div class="container">
                <div class="form-group">
                    <form name="add_name" id="add_name">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                    <td>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Level of Education</label>
                                                <select class="form-control" id="education_level" name="education_level[]">
                                                    <option value="nothing select">Select</option>
                                                    <option value="psc">PSC/5 pass</option>
                                                    <option value="jsc">JSC/JDC/8 pass</option>
                                                    <option value="secondary">Secondary</option>
                                                    <option value="higher">Higher Secondary</option>
                                                    <option value="diploma" selected="">Diploma</option>
                                                    <option value="bachelor">Bachelor/Honors</option>
                                                    <option value="master">Masters</option>
                                                    <option value="phd">PhD (Doctor of Philosophy)</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Result </label>
                                                <select class="form-control" id="result" name="result[]">
                                                    <option value="nothing select">Select</option>
                                                    <option value="first_class">First Division/Class</option>
                                                    <option value="second_class">Second Division/Class</option>
                                                    <option value="third_class">Third Division/Class</option>
                                                    <option value="grade">Grade</option>
                                                    <option value="appeared">Appeared</option>
                                                    <option value="enrolled">Enrolled</option>
                                                    <option value="awarded">Awarded</option>
                                                    <option value="do_not_mention">Do not mention</option>
                                                    <option value="passed" selected="Passed">Pass</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Exam/Degree Title</label>
                                                <input type="text" class="form-control" id="exam_degree" name="exam_degree[]" value="{{ ($personal->exam_degree) ? $personal->exam_degree : " Degree " }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Year of Passing </label>
                                                <select class="form-control" id="year" name="year[]">
                                                    <?php 
for($i = 1950 ; $i < date('Y'); $i++){
echo "<option>$i</option>";
}
?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Concentration/ Major/Group </label>
                                                <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="major_group[]" id="major_group" value="{{ ($personal->major_group) ? $personal->major_group : " Major Group " }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Duration (Years)</label>
                                                <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="duration[]" id="duration" value="{{ ($personal->duration) ? $personal->duration : " Duration " }}" placeholder="Duration">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Board </label>
                                                <select class="form-control" id="education_board" name="education_board[]">
                                                    <option value="" selected>Select One</option>
                                                    <option value="barisal">Barisal</option>
                                                    <option value="chittagong">Chittagong</option>
                                                    <option value="comilla">Comilla</option>
                                                    <option value="dhaka">Dhaka</option>
                                                    <option value="dinajpur">Dinajpur</option>
                                                    <option value="jessore">Jessore</option>
                                                    <option value="rajshahi">Rajshahi</option>
                                                    <option value="sylhet">Sylhet</option>
                                                    <option value="madrasah">Madrasah</option>
                                                    <option value="tec">Technical</option>
                                                    <option value="dibs">DIBS(Dhaka)</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Institute Name </label>
                                                <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="institute[]" id="institute" value="{{ ($personal->Institute) ? $personal->Institute : " Duration " }}" placeholder="Institute">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Achievement</label>
                                                <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="achievement[]" id="achievement" value="{{ ($personal->achievement) ? $personal->achievement : " achievement " }}" placeholder="achievement">
                                            </div>
                                        </div>

                                    </td>
                                    <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                    <td>
                                        <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                                    </td>
                                </tr>
                            </table>
                            <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                        </div>

                    </form>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    var postURL = "/dashboard/academic/details";
                    var i = 1;

                    $('#add').click(function() {
                        i++;
                        $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td> <div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Level of Education</label><select class="form-control" id="education_level" name="education_level[]"><option value="nothing select">Select</option><option value="psc">PSC/5 pass</option><option value="jsc">JSC/JDC/8 pass</option><option value="secondary">Secondary</option><option value="higher">Higher Secondary</option><option value="diploma" selected="">Diploma</option><option value="bachelor">Bachelor/Honors</option><option value="master">Masters</option><option value="phd">PhD (Doctor of Philosophy)</option></select></div><div class="form-group col-md-6"><label for="inputPassword4">Result </label><select class="form-control" id="result" name="result[]"><option value="nothing select">Select</option><option value="first_class">First Division/Class</option><option value="second_class">Second  Division/Class</option><option value="third_class">Third Division/Class</option><option value="grade">Grade</option><option value="appeared">Appeared</option><option value="enrolled">Enrolled</option><option value="awarded">Awarded</option><option value="do_not_mention">Do not mention</option><option value="passed" selected="Passed">Pass</option></select></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Exam/Degree Title</label><input type="text" class="form-control" id="exam_degree" name="exam_degree[]" ></div><div class="form-group col-md-6"><label for="inputPassword4">Year of Passing </label><select class="form-control" id="year" name="year[]"><?php for($i = 1950 ; $i < date('
                            Y '); $i++){echo "<option>$i</option>";}?></select></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Concentration/ Major/Group </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="major_group[]" id="major_group" ></div><div class="form-group col-md-6"><label for="inputPassword4">Duration (Years)</label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="duration[]" id="duration"></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Board </label><select class="form-control" id="education_board" name="education_board[]"><option value=""selected>Select One</option><option value="barisal">Barisal</option><option value="chittagong">Chittagong</option><option value="comilla">Comilla</option><option value="dhaka">Dhaka</option><option value="dinajpur">Dinajpur</option><option value="jessore">Jessore</option><option value="rajshahi">Rajshahi</option><option value="sylhet">Sylhet</option><option value="madrasah">Madrasah</option><option value="tec">Technical</option><option value="dibs">DIBS(Dhaka)</option></select></div><div class="form-group col-md-6"><label for="inputPassword4">Institute Name </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="institute[]" id="institute"></div></div><div class="form-row"> <div class="form-group col-md-6"><label for="inputPassword4">Achievement</label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="achievement[]" id="achievement"></div></div>     </td> <td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                    });

                    $(document).on('click', '.btn_remove', function() {
                        var button_id = $(this).attr("id");
                        $('#row' + button_id + '').remove();
                    });

                    $('#submit').click(function() {
                        $.ajax({
                            url: '/dashboard/academic/details',
                            method: "POST",
                            data: $('#add_name').serialize(),
                            type: 'json',
                            success: function(data) {
                                i = 1;
                                $('.dynamic-added').remove();
                                $('#add_name')[0].reset();
                                alert('Record Inserted Successfully.');
                            }
                        });
                    });

                });
            </script>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
Training Summary 
</button>
</h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
            <div class="container">
                <div class="form-group">
                    <form name="add__training_name" id="add__training_name">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_training_field">
                                <tr>
                                    <td>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Training Title </label>
                                                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_title2[]" id="training_title2" value="{{ ($personal2->training_title2) ? $personal2->training_title2 : " Training Title " }}">
                                                </div>
                                                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Training Country</label>
                                                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_country2[]" id="training_country2" value="{{ ($personal2->training_country2) ? $personal2->training_country2 : " Training Country " }}" placeholder="Duration">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Topics Covered </label>
                                                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_topics[]" id="training_topics" value="{{ ($personal2->training_topics) ? $personal2->training_topics : " Topics Covered " }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Training Year </label>
                                                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_year[]" id="training_year" value="{{ ($personal2->training_year) ? $personal2->training_year : " Training " }}" placeholder="Duration">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Training Institute </label>
                                                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_inst[]" id="training_inst" value="{{ ($personal2->training_inst) ? $personal2->training_inst : " Training Institute " }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Training Duration </label>
                                                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_period[]" id="training_period" value="{{ ($personal2->training_period) ? $personal2->training_period : " Duration " }}" placeholder="Duration">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4"> Training Location </label>
                                                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_locate[]" id="training_locate" value="{{ ($personal2->training_locate) ? $personal2->training_locate : " Training Location " }}">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" name="addmore" id="addmore" class="btn btn-success">Add More</button>
                                    </td>
                                </tr>
                            </table>
                            <input type="button" name="training_submit" id="training_submit" class="btn btn-info" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                var postURL = "/dashboard/academic/training/summary";
                var i = 1;

                $('#addmore').click(function() {
                    i++;
                    $('#dynamic_training_field').append('<tr id="row' + i + '" class="dynamic-added"><td>  <div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Training Title  </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_title2[]" id="training_title2"></div><div class="form-group col-md-6"><label for="inputPassword4">Training Country</label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_country2[]" id="training_country2"></div></div><div class="form-row"><div class="form-group col-md-6"> <label for="inputEmail4">Topics Covered  </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_topics[]" id="training_topics"></div><div class="form-group col-md-6"><label for="inputPassword4">Training Year </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_year[]" id="training_year"></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Training Institute  </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_inst[]" id="training_inst"></div><div class="form-group col-md-6"><label for="inputPassword4">Training Duration  </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_period[]" id="training_period"></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4"> Training Location  </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_locate[]" id="training_locate"></div></div>  </td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                });

                $(document).on('click', '.btn_remove', function() {
                    var button_id = $(this).attr("id");
                    $('#row' + button_id + '').remove();
                });

                $('#training_submit').click(function() {
                    $.ajax({
                        url: postURL,
                        method: "POST",
                        data: $('#add__training_name').serialize(),
                        type: 'json',
                        success: function(data) {
                            i = 1;
                            $('.dynamic-added').remove();
                            $('#add__training_name')[0].reset();
                            alert('Record Inserted Successfully.');
                        }
                    });
                });

            });
        </script>
    </div>
</div>
<div class="card">
    <div class="card-header" id="headingThree">
        <h2 class="mb-0">
<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
Professional Qualification
</button>
</h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
            <div class="form-group">
                <form name="add_certificate" id="add_certificate">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="certificate">
                            <tr>
                                <td>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Certificate</label>
                                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="certicate1[]" id="certicate1">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Certificate Location </label>
                                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="certificate_location2[]" id="certificate_location2">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Training Institiute </label>
                                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_inst[]" id="training_inst">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Training Period </label>
                                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_period[]" id="training_period">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Training Location </label>
                                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_locate[]" id="training_locate">
                                        </div>
                                        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                    </div>
                                </td>
                                <td>
                                    <button type="button" name="add_more_certificate" id="add_more_certificate" class="btn btn-success">Add More</button>
                                </td>
                            </tr>
                        </table>
                        <input type="button" name="submit_certificate" id="submit_certificate" class="btn btn-info" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                var postURL = "/dashboard/certificatte1/details2";
                var i = 1;

                $('#add_more_certificate').click(function() {
                    i++;
                    $('#certificate').append('<tr id="row' + i + '" class="dynamic-added"><td> <div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Certificate</label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="certicate1[]" id="certicate1"></div><div class="form-group col-md-6"><label for="inputPassword4">Certificate Location </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="certificate_location2[]" id="certificate_location2"></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Training Institiute </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_inst[]" id="training_inst"></div><div class="form-group col-md-6"><label for="inputPassword4">Training Period </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_period[]" id="training_period"></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Training Location  </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_locate[]" id="training_locate"></div></div>  </td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                });

                $(document).on('click', '.btn_remove', function() {
                    var button_id = $(this).attr("id");
                    $('#row' + button_id + '').remove();
                });

                $('#submit_certificate').click(function() {
                    $.ajax({
                        url: postURL,
                        method: "POST",
                        data: $('#add_certificate').serialize(),
                        type: 'json',
                        success: function(data) {
                            i = 1;
                            $('.dynamic-added').remove();
                            $('#add_certificate')[0].reset();
                            alert('Record Inserted Successfully.');
                        }
                    });
                });

            });
        </script>
    </div>
</div>
</div>
</div>
<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
<div class="accordion" id="accordionExample">
<div class="card">
    <div class="card-header" id="headingOne">
        <h2 class="mb-0">
<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
Employment History 
</button>
</h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <div class="form-group">
                <form name="add_name_profesional" id="add_name_profesional">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dynamic_field_prof">
                            <tr>
                                <td>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Company Name </label>
                                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="com_name[]" id="com_name" value="{{ ($personal2->com_name) ? $personal2->com_name : " Company Name " }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Responsibilities</label>
                                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="responsibilities[]" id="responsibilities" value="{{ ($personal2->responsibilities) ? $personal2->responsibilities : " Responsibilities " }}" placeholder="Duration">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Company business </label>
                                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="com_business[]" id="com_business" value="{{ ($personal2->com_business) ? $personal2->com_business : " Company business " }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Company Location </label>
                                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="com_loaction[]" id="com_loaction" value="{{ ($personal2->com_loaction) ? $personal2->com_loaction : " Company Location " }}" placeholder="Duration">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Designation </label>
                                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="designation[]" id="designation" value="{{ ($personal2->designation) ? $personal2->designation : " Designation " }}">
                                        </div>
                                        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Employment Period </label>
                                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="emp_period[]" id="emp_period" value="{{ ($personal2->emp_period) ? $personal2->emp_period : " Employment Period " }}" placeholder="Duration">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" name="add_more_emp" id="add_more_emp" class="btn btn-success">Add More</button>
                                </td>
                            </tr>
                        </table>
                        <input type="button" name="submit_prof" id="submit_prof" class="btn btn-info" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                var postURL = "/dashboard/employment/details";
                var i = 1;

                $('#add_more_emp').click(function() {
                    i++;
                    $('#dynamic_field_prof').append('<tr id="row' + i + '" class="dynamic-added"><td><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Company Name </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="com_name[]" id="com_name"></div><div class="form-group col-md-6"><label for="inputPassword4">Responsibilities</label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="responsibilities[]" id="responsibilities"></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Company business </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="com_business[]" id="com_business"></div><div class="form-group col-md-6"><label for="inputPassword4">Company Location </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="com_loaction[]" id="com_loaction"  placeholder="Duration"></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Designation  </label> <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="designation[]" id="designation"></div><div class="form-group col-md-6"><label for="inputPassword4">Employment Period </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="emp_period[]" id="emp_period"></div></div> </td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                });

                $(document).on('click', '.btn_remove', function() {
                    var button_id = $(this).attr("id");
                    $('#row' + button_id + '').remove();
                });

                $('#submit_prof').click(function() {
                    $.ajax({
                        url: postURL,
                        method: "POST",
                        data: $('#add_name_profesional').serialize(),
                        type: 'json',
                        success: function(data) {
                            i = 1;
                            $('.dynamic-added').remove();
                            $('#add_name_profesional')[0].reset();
                            alert('Record Inserted Successfully.');
                        }
                    });
                });

            });
        </script>
    </div>
</div>
<div class="card">
    <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
Employment History For Retired Army Person 
</button>
</h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="form_name">BA No. *</label>
                        <select name="batch" id="batch" class="form-control">
                            <option value="BA">BA</option>
                            <option value="BSS">BSS</option>
                            <option value="JSS">JSS</option>
                            <option value="BSP">BSP</option>
                            <option value="BJO">BJO</option>
                            <option value="No">NO</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="form_name" class="text-hidden"></label>
                        <input type="text" name="batch_no" id="batch_no" class="form-control">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_phone">Ranks *</label>
                        <input type="text" id="ranks" name="ranks" class="form-control">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_phone">Type *</label>
                        <select name="type" id="type" class="form-control">
                            <option value="Officer">Officer</option>
                            <option value="JCO">JCO</option>
                            <option value="NCO">NCO</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_phone">Arms *</label>
                        <select name="arms" id="arms" class="form-control">
                            <option value="Ac">Ac</option>
                            <option value="Arty">Arty</option>
                            <option value="EB">EB</option>
                            <option value="Bir">Bir</option>
                            <option value="Sigs">Sigs</option>
                            <option value="EME">EME</option>
                            <option value="Engr">Engr</option>
                            <option value="ORD">ORD</option>
                            <option value="ASC">ASC</option>
                            <option value="AMC">AMC</option>
                            <option value="AEC">AEC</option>
                            <option value="ADC">ADC</option>
                            <option value="CMP">CMP</option>
                            <option value="AFNS">AFNS</option>
                            <option value="RVFC">RVFC</option>
                            <option value="ACC">ACC</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_phone">Trade</label>
                        <input id="trade" type="text" name="trade" class="form-control">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_phone">Course </label>
                        <input id="course" type="text" name="course" class="form-control">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_phone">Date of Commission *</label>
                        <input id="commission" type="date" name="commission" class="form-control">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_phone">Date of Retirement * </label>
                        <input id="retirement" type="date" name="retirement" class="form-control">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="col-sm-6">
                    <div class="form-group">
                        <button type="submit" id="retirement_submit" class="btn btn-success">Submit</button>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

            </div>

            <script>
                $(document).ready(function() {

                    $('#retirement_submit').on('click', function() {
                        var batch = $('#batch').val();
                        var batch_no = $('#batch_no').val();
                        var ranks = $('#ranks').val();
                        var type = $('#type').val();
                        var arms = $('#arms').val();
                        var trade = $('#trade').val();
                        var course = $('#course').val();
                        var commission = $('#commission').val();
                        var retirement = $('#retirement').val();

                        if (batch != "" && batch_no != "") {
                            $.ajax({
                                url: "/dashboard/army/submit",
                                type: "POST",
                                data: {
                                    _token: $("#csrf").val(),
                                    type: 1,
                                    batch: batch,
                                    batch_no: batch_no,
                                    ranks: ranks,
                                    type: type,
                                    arms: arms,
                                    trade: trade,
                                    course: course,
                                    commission: commission,
                                    retirement: retirement,

                                },
                                cache: false,
                                success: function(dataResult) {
                                    console.log(dataResult);
                                    var dataResult = JSON.parse(dataResult);
                                    if (dataResult.statusCode == 200) {
                                        alert("Information Successfully Saved !");
                                    } else if (dataResult.statusCode == 201) {
                                        alert("Error occured !");
                                    }

                                }
                            });
                        } else {
                            alert('Please fill all the field !');
                        }
                    });
                });
            </script>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
<div class="card-body">
<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
Specialiszation
</button>
</h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    <form name="add_specialisation" id="add_specialisation">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field_special">
                                <tr>
                                    <td>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Skill </label>
                                                <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="skill[]" id="skill">
                                            </div>
                                            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">How did you learn the skill ? </label>
                                                <br>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" value="Job" name="how_did_you_learn[]">Job</label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" value="Educational" name="how_did_you_learn[]">Educational </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" value="Professional Training" name="how_did_you_learn[]">Professional Training </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" value="NTVQF" name="how_did_you_learn[]">NTVQF</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" name="add_special" id="add_special" class="btn btn-success">Add More</button>
                                    </td>
                                </tr>
                            </table>
                            <input type="button" name="submit_special" id="submit_special" class="btn btn-info" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    var postURL = "/dashboard/others/information/details";
                    var i = 1;
                    $('#add_special').click(function() {
                        i++;
                        $('#dynamic_field_special').append('<tr id="row' + i + '" class="dynamic-added"><td><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Skill </label> <input type="text" class="form-control" name="skill[]" id="skill"></div><div class="form-group col-md-6"><label for="inputPassword4"> How did you learn the skill ? </label><br><label class="checkbox-inline"> <input type="checkbox" id="how_did_you_learn" name="how_did_you_learn[]" value="Job">  Job </label><label class="checkbox-inline"> <input type="checkbox" id="how_did_you_learn" name="how_did_you_learn[]" value="Educational"> Educational </label><label class="checkbox-inline"> <input type="checkbox" id="how_did_you_learn" name="how_did_you_learn[]" value="Professional Training"> Professional Training </label><label class="checkbox-inline"> <input type="checkbox" id="how_did_you_learn" name="how_did_you_learn[]" value="NTVQF"> NTVQF</label></div></div></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                    });

                    $(document).on('click', '.btn_remove', function() {
                        var button_id = $(this).attr("id");
                        $('#row' + button_id + '').remove();
                    });

                    $('#submit_special').click(function() {
                        $.ajax({
                            url: postURL,
                            method: "POST",
                            data: $('#add_specialisation').serialize(),
                            type: 'json',
                            success: function(data) {
                                i = 1;
                                $('.dynamic-added').remove();
                                $('#add_specialisation')[0].reset();
                                alert('Record Inserted Successfully.');
                            }
                        });
                    });

                });
            </script>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
Language
</button>
</h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    <form name="add_language" id="add_language">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field_lang">
                                <tr>
                                    <td>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Language</label>
                                                <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="language" name="language[]">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label for="sel1">Reading </label>
                                                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="reading" name="reading[]">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Writing </label>
                                                <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="writing" name="writing[]">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label for="sel1">Speaking </label>
                                                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="speaking" name="speaking[]">
                                                </div>
                                                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" name="add_more_lang" id="add_more_lang" class="btn btn-success">Add More</button>
                                    </td>
                                </tr>
                            </table>
                            <input type="button" name="submit_language" id="submit_language" class="btn btn-info" value="Submit" />
                        </div>
                    </form>
                </div>

            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    var postURL = "/dashboard/others/information/language";
                    var i = 1;

                    $('#add_more_lang').click(function() {
                        i++;
                        $('#dynamic_field_lang').append('<tr id="row' + i + '" class="dynamic-added"><td><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Language</label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="language" name="language[]"></div><div class="form-group col-md-6"><div class="form-group"><label for="sel1">Reading </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="reading" name="reading[]"></div></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Writing </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="writing" name="writing[]"></div><div class="form-group col-md-6"><div class="form-group"><label for="sel1">Speaking </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="speaking" name="speaking[]"></div></div></div></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                    });

                    $(document).on('click', '.btn_remove', function() {
                        var button_id = $(this).attr("id");
                        $('#row' + button_id + '').remove();
                    });

                    $('#submit_language').click(function() {
                        $.ajax({
                            url: postURL,
                            method: "POST",
                            data: $('#add_language').serialize(),
                            type: 'json',
                            success: function(data) {
                                i = 1;
                                $('.dynamic-added').remove();
                                $('#add_language')[0].reset();
                                alert('Record Inserted Successfully.');
                            }
                        });
                    });

                });
            </script>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
Reference
</button>
</h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    <form name="add_ref_name" id="add_ref_name">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field_ref">
                                <tr>
                                    <td>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Name</label>
                                                <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_name" name="ref_name[]" placeholder="Enter your best skill">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label for="sel1">Organization </label>
                                                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_organization" name="ref_organization[]" placeholder="Enter your best skill">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Designation </label>
                                                <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_designation" name="ref_designation[]" placeholder="Enter your best ref_designation">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label for="sel1">Mobile </label>
                                                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_mobile" name="ref_mobile[]" placeholder="Enter your best ref_mobile">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Email </label>
                                                <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_email" name="ref_email[]" placeholder="Enter your best ref_email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label for="sel1">Address </label>
                                                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="re_address" name="re_address[]" placeholder="Enter your best re_address">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Relation </label>
                                                <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_relation" name="ref_relation[]" placeholder="Enter your best ref_relation">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" name="add_ref" id="add_ref" class="btn btn-success">Add More</button>
                                    </td>
                                </tr>
                            </table>
                            <input type="button" name="submit_ref" id="submit_ref" class="btn btn-info" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    var postURL = "/dashboard/others/information/reference";
                    var i = 1;

                    $('#add_ref').click(function() {
                        i++;
                        $('#dynamic_field_ref').append('<tr id="row' + i + '" class="dynamic-added"><td><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Name</label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_name" name="ref_name[]" placeholder="Enter your best skill"></div><div class="form-group col-md-6"><div class="form-group"><label for="sel1">Organization  </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_organization" name="ref_organization[]" placeholder="Enter your best skill"></div></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Designation </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_designation" name="ref_designation[]" placeholder="Enter your best ref_designation"></div><div class="form-group col-md-6"> <div class="form-group"><label for="sel1">Mobile   </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_mobile" name="ref_mobile[]"  placeholder="Enter your best ref_mobile"></div></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Email </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_email" name="ref_email[]" placeholder="Enter your best ref_email"></div> <div class="form-group col-md-6"><div class="form-group"><label for="sel1">Address   </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="re_address" name="re_address[]"  placeholder="Enter your best re_address"></div> </div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Relation </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_relation" name="ref_relation[]" placeholder="Enter your best ref_relation"></div> </div></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                    });

                    $(document).on('click', '.btn_remove', function() {
                        var button_id = $(this).attr("id");
                        $('#row' + button_id + '').remove();
                    });

                    $('#submit_ref').click(function() {
                        $.ajax({
                            url: postURL,
                            method: "POST",
                            data: $('#add_ref_name').serialize(),
                            type: 'json',
                            success: function(data) {
                                i = 1;
                                $('.dynamic-added').remove();
                                $('#add_ref_name')[0].reset();
                                alert('Record Inserted Successfully.');
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>

</div>
<div class="tab-pane fade" id="nav-photo" role="tabpanel" aria-labelledby="nav-photo-tab">
    <div class="card-body">
        <form id="upload_form" action="javascript:void(0)" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="exampleFormControlFile1">Your Profile Photo</label>
                    <input type="file" name="file" class="form-control-file" id="select_file">
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="form-group col-md-6">
                <button type="submit" id="upload" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(e) {

        $('#upload_form').on('submit', (function(e) {

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({

                type: 'POST',

                url: "{{ url('/dashboard/photograph/upload')}}",

                data: formData,

                cache: false,

                contentType: false,

                processData: false,

                success: function(data) {

                    alert('Successfully uploaded your photograph');

                },

                error: function(data) {

                    console.log(data);

                }

            });

        }));

    });
</script>

</div>

</div>
</div>
</div>
</section>
</div>
</div>