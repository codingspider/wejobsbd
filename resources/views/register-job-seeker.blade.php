@extends('layouts.theme')

@section('content')
<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('app.country') }} <span class="mendatory-mark">*</span></label>
                            <div class="col-md-6">
                                <select name="country" class="form-control country_to_state" required autofocus>
                                    <option value="">@lang('app.select_a_country')</option>
                                    @foreach($countries as $country)
                                    <option value="{!! $country->id !!}" @if(old('country') && $country->id == old('country')) selected="selected" @endif >{!! $country->country_name !!}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('country'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">Gender <span class="mendatory-mark">*</span></label>
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

                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('app.state') }} <span class="mendatory-mark">*</span></label>
                            <div class="col-md-6">
                                <select name="state" class="form-control state_options" required autofocus>
                                    <option value="">Select a state</option>

                                    @if($old_country)
                                    @foreach($old_country->states as $state)
                                    <option value="{{$state->id}}" @if(old('state') && $state->id == old('state')) selected="selected" @endif >{!! $state->state_name !!}</option>
                                    @endforeach
                                    @endif

                                </select>

                                @if ($errors->has('state'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="la la-save"></i> {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection
