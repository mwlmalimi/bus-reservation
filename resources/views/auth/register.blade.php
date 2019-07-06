@extends('admin.layouts.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      {{--<marquee>
        <h1 style="color:blue;">
          <b>WELCOME TO ONLINE BUS TICKET RESERVATION SYSTEM.</b>
        </h1>
      </marquee>--}}
        <div class="col-md-8">

            @if(session('message'))
            <div class="row">
              <div class="col-12">
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Success!</strong> {{session('message')}}.
                </div>
              </div>
            </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Register Here') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="company_name" class="col-md-4 col-form-label text-md-right">
                              {{ __('Company Name') }}
                            </label>

                            <div class="col-md-6">
                                <input id="company_name" type="text"
                                  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                  name="company_name" value="{{ old('company_name') }}"
                                  required autocomplete="company_name" autofocus>

                                @if ($errors->has('company_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">
                            {{ __('Administrator Name') }}
                          </label>

                          <div class="col-md-6">
                              <input id="name" type="text"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                name="name" value="{{ old('name') }}"
                                required autocomplete="name">

                              @if ($errors->has('name'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">
                            {{ __('Administrator Email') }}
                          </label>

                          <div class="col-md-6">
                              <input id="email" type="text"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                name="email" value="{{ old('email') }}"
                                required autocomplete="email">

                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                        </div>


                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">
                              {{ __('Administrator Username') }}
                            </label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autocomplete="username">

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                              {{ __('Administrator Password') }}
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
