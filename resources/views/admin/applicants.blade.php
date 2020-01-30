@extends('layouts.dashboard')

@section('content')
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

                                <p class="text-muted"><i class="la la-book"></i>  <a href="{{ URL::to('view/applicants/cv/'.$application->wejobs_format) }}"> View applicants resume  </a> </p>
                                @else
                                <p class="text-muted"><i class="la la-book"></i> <a href="{{ URL::to('uploads/'.$application->resume) }}"> View applicants resume  </a> </p>

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



@endsection
