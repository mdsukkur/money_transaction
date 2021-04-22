@extends('frontend.master')

@section('title', 'Change Password')

@section('content')
    <div class="container mt-4">
        <div class="row">

            @include('response.index')

            <div class="col-md-5 col-12 mt-xl-3">
                <h5>{{ trans('lang.update_password') }}</h5>
                <p>{{ trans('lang.update_password_msg') }}</p>
            </div>

            <div class="col-md-7 col-12">
                <div class="bg-white shadow-sm rounded p-3 pt-sm-5 pb-sm-5 px-sm-5 mb-4">

                    <form id="changePassword" method="post" action="{{ route('user.password.update') }}">
                        @csrf

                        <div class="form-group">
                            <label for="existingPassword">{{ trans('form.crnt_password') }}</label>
                            <input type="password" class="form-control" name="current_password" autofocus
                                   id="existingPassword" required
                                   placeholder="{{ trans('form.crnt_password') }}">
                        </div>

                        <div class="form-group">
                            <label for="newPassword">{{ trans('form.new_password') }}</label>
                            <input type="password" class="form-control" name="password"
                                   id="newPassword" required placeholder="{{ trans('form.new_password') }}">
                        </div>

                        <div class="form-group">
                            <label for="confirmPassword">{{ trans('form.con_new_password') }}</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                   required
                                   id="confirmPassword" placeholder="{{ trans('form.con_new_password') }}">
                        </div>

                        <button class="btn btn-primary btn-block mt-4" type="submit">
                            {{ trans('form.update_password') }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
