@extends('layouts.dashboard')

@section('content')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel='stylesheet' type='text/css'>

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js'></script>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Quick Filter</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Academic </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Experience</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="s009">
            <form action="{{ URL::to('/dashboard/applicant/filter/') }}" method="POST">
                @csrf
                <div class="inner-form">
                    <div class="basic-search">
                        <div class="input-field">
                            <input id="search" type="text" placeholder="Type Keywords" />
                            <div class="icon-wrap">
                                <svg class="svg-inline--fa fa-search fa-w-16" fill="#ccc" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="advance-search">
                        <span class="desc">ADVANCED SEARCH</span>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Applicant Name</label>
                                <input type="text" name="name" class="form-control name-pull-image">
                            </div>
                            <div class="col-md-3">
                                <label>Date range from</label>
                                <input type="date" name="date_form" class="form-control name-pull-image">
                            </div>
                            <div class="col-md-3">
                                <label>Age range to</label>
                                <input type="date" name="date_to" class="form-control name-pull-image">
                            </div>
                        </div>
                        <div class="row second">
                            <div class="col-md-6">
                                <label>Location </label>
                                <select class="js-example-basic-single form-control" name="location">
                                    @foreach($countries as $value)
                                    <option value="{{ $value->id }}">{{ $value->state_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <!-- Material inline 1 -->
                                <label for="gender"> Gender </label><br>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="gender" value="male" class="form-check-input" id="materialInline1">
                                    <label class="form-check-label" for="materialInline1">Male</label>
                                </div>

                                <!-- Material inline 2 -->
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="gender" value="female" id="materialInline2">
                                    <label class="form-check-label" for="materialInline2">Female</label>
                                </div>

                                <!-- Material inline 3 -->
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="gender" value="other" id="materialInline3">
                                    <label class="form-check-label" for="materialInline3">Other</label>
                                </div>

                            </div>
                        </div>
                        <div class="row second">

                            <div class="row">

                                <div class="col-md-4">
                                    <label>Salary range from</label>
                                    <input type="text" name="salary_from" class="form-control name-pull-image">
                                </div>
                                <div class="col-md-4">
                                    <label>Salary range to</label>
                                    <input type="text" name="salary_to" class="form-control name-pull-image">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Material inline 1 -->
                                <label for="gender"> Job Level </label><br>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="job_level" value="entry_level" id="materialInline1">
                                    <label class="form-check-label" for="materialInline1">Entry Level</label>
                                </div>

                                <!-- Material inline 2 -->
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="job_level" value="mid_level" id="materialInline2">
                                    <label class="form-check-label" for="materialInline2">Mid Level</label>
                                </div>

                                <!-- Material inline 3 -->
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="job_level" value="mid_level" id="materialInline3">
                                    <label class="form-check-label" for="materialInline3">Top Level</label>
                                </div>

                            </div>
                        </div>
                        <div class="row third">
                            <div class="input-field">
                                <div class="result-count">
                                    <div class="group-btn">
                                        <button class="btn-search">SEARCH</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        rashed
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        sohag
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        @if($applications->count())
        <table class="table table-bordered">

            <tr>
                <th>@lang('app.name')</th>
                <th>Employer</th>
                <th>#</th>
            </tr>

            @foreach($applications as $application)
            <tr>
                <td>
                    <i class="la la-user"></i> {{$application->name}}
                    <p class="text-muted"><i class="la la-clock-o"></i> {{ $application->created_at }}</p>
                    <p class="text-muted"><i class="la la-envelope-o"></i> {{$application->email}}</p>
                    <p class="text-muted"><i class="la la-phone-square"></i> {{$application->phone_number}}</p>
                    @if($application->wejobs_format)

                    <p class="text-muted"><i class="la la-book"></i> <a href="{{ URL::to('view/applicants/cv/'.$application->wejobs_format) }}"> View applicants resume </a> </p>
                    @else
                    <p class="text-muted"><i class="la la-book"></i> <a href="{{ URL::to('uploads/'.$application->resume) }}"> View applicants resume </a> </p>

                    @endif
                </td>

                <td>
                    <p class="text-muted"><i class="la la-book"></i> {{ $application->jtitle }}</p>
                    <p class="text-muted"><i class="la la-user"></i> {{ $application->ename }}</p>
                    <p class="text-muted"><i class="la la-clock-o"></i> {{ $application->ecompany }}</p>
                </td>
                <td>
                    @if($application->is_shortlisted == NULL)
                    <a href="{{route('make_short_list', $application->id)}}" class="btn btn-success"><i class="la la-user-plus"></i> @lang('app.shortlist') </a>
                    @else
                    @lang('app.shortlisted')
                    @endif
                </td>

            </tr>
            @endforeach

        </table>


        {!! $applications->links() !!}
        @else
        <div class="row">
            <div class="col-md-12">
                <div class="no data-wrap py-5 my-5 text-center">
                    <h1 class="display-1"><i class="la la-frown-o"></i> </h1>
                    <h1>No Data available here</h1>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

@endsection
