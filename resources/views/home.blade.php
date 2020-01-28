@extends('layouts.theme')

@section('content')
<br>
<div style="background-image: url({{ asset('images/env.jpg') }}); background-repeat: no-repeat; background-size: 1200px 500px;" class="home-hero-section container">
    <div class="job-search-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <br>
                    <br>
                    <h1 style="color:white">Find the job that you deserve</h1>
                    <p class="mt-4 mb-4 job-search-sub-text" style="color:white">More than 3000+ trusted live jobs available from 500+ different employer, <br /> and agents on this website to take your career next level</p>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <form action="{{route('jobs_listing')}}" class="form-inline" method="get">
                        <div class="form-row">
                            <div class="col-auto">
                                <input type="text" name="q" class="form-control mb-2" style="min-width: 300px;" placeholder="@lang('app.job_title_placeholder')">
                                <input type="text" name="location" class="form-control" style="min-width: 300px;" placeholder="@lang('app.job_location_placeholder')">
                                <button type="submit" class="btn btn-success mb-2"><i class="la la-search"></i> @lang('app.search') @lang('app.job')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@if($categories->count())
<div class="home-categories-wrap bg-white">
    <div class="container">
    <div class="row">
            <div class="col-md-12">
                <h4 class="mb-3">@lang('app.categories')</h4>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-10">
                 <div class="row">
                    @foreach($categories as $category)
                    <div class="col-md-3">
                        <p>
                            <a href="{{route('jobs_listing', ['category' => $category->id])}}" class="category-link"><i class="la la-th-large"></i> {{$category->category_name}} <span class="text-muted">({{$category->job_count}})</span> </a>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-2">
                <img  alt="W3Schools" src="{{ asset('images/ads.jpg') }}" width="150" height="300">
            </div>
            </div>
        </div>

    </div>
</div>
@endif



@if($premium_jobs->count())
<div class="premium-jobs-wrap pb-5 pt-5">

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-3">@lang('app.premium_jobs')</h4>
            </div>
        </div>

        <div class="row">
            @foreach($premium_jobs as $job)
            <div class="col-md-3 mb-3">
                <div class="premium-job-box p-3 bg-white box-shadow">

                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="premium-job-logo">
                                <a href="{{route('jobs_by_employer', $job->employer->company_slug)}}">
                                    <img src="{{$job->employer->logo_url}}" class="img-fluid" />
                                </a>
                            </div>
                        </div>

                        <div class="col-md-9 col-sm-9">

                            <p class="job-title">
                                <a href="{{route('job_view', $job->job_slug)}}">{!! $job->job_title !!}</a>
                            </p>

                            <p class="text-muted m-0">
                                <a href="{{route('jobs_by_employer', $job->employer->company_slug)}}" class="text-muted">
                                    {{$job->employer->company}}
                                </a>
                            </p>
<!--
                            <p class="text-muted m-0">
                                <i class="la la-map-marker"></i>
                                @if($job->city_name)
                                {!! $job->city_name !!},
                                @endif
                                @if($job->state_name)
                                {!! $job->state_name !!},
                                @endif
                                @if($job->state_name)
                                {!! $job->country_name !!}
                                @endif
                            </p> -->
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
<div class="text-center">
    <img border="0" alt="W3Schools" src="{{ asset('images/images.png') }}" width="1000" height="150">
</div>
<br>
</div>
@endif



<div class="new-registration-page bg-white pb-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="home-register-account-box">
                    <h4>@lang('app.job_seeker')</h4>
                    <p class="box-icon"><img src="{{asset('assets/images/employee.png')}}" /></p>
                    <p>@lang('app.job_seeker_new_desc')</p>
                    <a href="{{route('register_job_seeker')}}" class="btn btn-success"><i class="la la-user-plus"></i> @lang('app.register_account') </a>
                </div>
                <br>
                <ul class="list-unstyled">

                    <li><a href="{{route('jobs_listing')}}">@lang('app.search_jobs')</a> </li>
                    <li><a href="{{route('applied_jobs')}}">@lang('app.applied_jobs')</a> </li>
                </ul>
            </div>

            <div class="col-md-4">
                <div class="home-register-account-box">
                    <h4>@lang('app.employer')</h4>
                    <p class="box-icon"><img src="{{asset('assets/images/enterprise.png')}}" /></p>
                    <p>@lang('app.employer_new_desc')</p>
                    <a href="{{route('register_employer')}}" class="btn btn-success"><i class="la la-user-plus"></i> @lang('app.register_account') </a>
                </div>
                <br>
                <ul class="list-unstyled">

                    <li><a href="{{route('post_new_job')}}">@lang('app.post_new_job')</a> </li>
                    <li><a href="{{route('pricing')}}">@lang('app.buy_premium_package')</a> </li>
                </ul>
            </div>

            <div class="col-md-4">
                <div class="home-register-account-box">
                    <h4>@lang('app.agency')</h4>
                    <p class="box-icon"><img src="{{asset('assets/images/agent.png')}}" /></p>
                    <p>@lang('app.agency_new_desc')</p>
                    <a href="{{route('register_agent')}}" class="btn btn-success"><i class="la la-user-plus"></i> @lang('app.register_account') </a>
                </div>
            </div>
        </div>
    </div>
</div>


<br>
<div style="background-color:#2f64a3;" class="new-registration-page bg-white pb-5 pt-5">
    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <div class="call-to-action-post-job justify-content-center">
                    <div class="job-post-icon my-auto">
                        <img src="{{asset('assets/images/job.png')}}" />
                    </div>
                    <div class="job-post-details mr-3 ml-3 p-3 my-auto">
                        <h1>Post your job</h1>
                        <p>
                            Job seekers looking for quality job always. <br /> Post your job to get the talents
                        </p>
                    </div>

                    <div class="job-post-button my-auto">
                        <a href="{{route('post_new_job')}}" class="btn btn-success btn-lg">Post a Job</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<br>


@endsection
