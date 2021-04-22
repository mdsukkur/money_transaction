@php
    use App\Helpers\CountryLists;
    use App\Helpers\StateLists;
@endphp

@extends('frontend.master')

@section('title', 'Edit Profile')

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/daterangepicker.css') }}">
    <style>
        .custom_fileupload {
            border: 2px dashed #ddd;
            width: 50%;
            padding: 10px;
            position: relative;
            overflow: hidden;
            margin: 0 0 20px 30px;
            display: inline-block;
        }

        .custom_fileupload input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            height: 100%;
        }

        @media only screen and (max-width: 600px) {
            .custom_fileupload {
                margin: 0 0 20px 10px !important;
                width: calc(100% - 145px) !important;
            }
        }

        .wt-btn {
            color: #fff;
            padding: 10px 30px;
            background-color: #2dbe60;
            border-radius: 5px;
            border: none;
            text-transform: uppercase;
        }
    </style>
@endpush

@section('content')
    <div class="container mt-4">
        <div class="row">

            @include('response.index')

            <div class="col-md-4 col-lg-4 col-xl-4 col-12 mt-xl-3">
                <h5>{{ trans('lang.profile_info') }}</h5>
                <p>{{ trans('lang.profile_info_msg') }}</p>
            </div>

            <div class="col-md-8 col-lg-8 col-xl-8 col-12">
                <div class="bg-white shadow-sm rounded p-3 pt-sm-5 pb-sm-5 px-sm-5 mb-4">

                    <form action="{{ route('user.profile.request') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="firstName" class="w-100">{{ trans('form.profile_pic') }}</label>

                                <img class="rounded-circle profile-picture" alt="Md Sukkur" width="100px" height="100px"
                                     src="{{ userProfilePicture(auth()->id(), auth()->user()->picture ?? null, 100) }}">

                                <div class="custom_fileupload">
                                    <button class="wt-btn">Select File</button>
                                    <input type="file" name="picture" onchange="previewFiles(this,'.profile-picture')"
                                           accept="image/*" required/>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 form-group">
                                <label for="firstName">{{ trans('form.fname') }}</label>

                                <input type="text" value="{{ auth()->user()->first_name ?? null }}"
                                       class="form-control" name="first_name"
                                       id="firstName" required placeholder="{{ trans('form.fname') }}">
                            </div>

                            <div class="col-12 col-sm-6 form-group">
                                <label for="fullName">{{ trans('form.lname') }}</label>

                                <input type="text" value="{{ auth()->user()->last_name ?? null }}"
                                       class="form-control" name="last_name"
                                       id="fullName" required placeholder="{{ trans('form.lname') }}">
                            </div>

                            <div class="col-12 col-sm-6 form-group">
                                <label for="email">{{ trans('form.email') }}</label>
                                <input type="email" value="{{ auth()->user()->email }}" class="form-control"
                                       id="email" required placeholder="{{ trans('form.email') }}" name="email">
                            </div>

                            <div class="col-12 col-sm-6 form-group">
                                <label for="phone">{{ trans('form.phone') }}</label>
                                <input type="tel" value="{{ auth()->user()->phone }}" class="form-control"
                                       id="phone" required placeholder="{{ trans('form.phone') }}" name="phone">
                            </div>

                            <div class="col-12 form-group">
                                <label for="address">{{ trans('form.address') }}</label>

                                <input type="text" value="{{ auth()->user()->address ?? null }}"
                                       required class="form-control" id="address" name="address"
                                       placeholder="{{ trans('form.address') }}">
                            </div>

                            <div class="col-12 col-sm-4 form-group">
                                <label for="birthDate">{{ trans('form.birth_date') }}</label>

                                <div class="position-relative">
                                    <input id="birthDate" class="form-control" name="birth_date" required
                                           value="{{ !is_null(auth()->user()->birth_date) ? date('m-d-Y', strtotime(auth()->user()->birth_date)) : '' }}"
                                           type="text" placeholder="{{ trans('form.birth_date') }}">
                                    <span class="icon-inside"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4 form-group">
                                <label for="city">{{ trans('form.city') }}</label>

                                <input id="city" value="{{ auth()->user()->city ?? null }}" type="text"
                                       class="form-control" required name="city" placeholder="{{ trans('form.city') }}">
                            </div>

                            <div class="col-12 col-sm-4 form-group">
                                <label for="input-zone">{{ trans('form.state') }}</label>

                                <select class="custom-select" id="input-zone" name="state">

                                    @foreach(StateLists::getAllStates() as $key => $value)
                                        <option value="{{ $key }}"
                                        @if($key == (auth()->user()->state ?? null)) {{ 'selected' }} @endif>
                                            {{ $value }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-12 col-sm-6 form-group">
                                <label for="zipCode">{{ trans('form.zip') }}</label>

                                <input id="zipCode" value="{{ auth()->user()->zip_code ?? null }}" type="text"
                                       class="form-control" name="zip_code" required
                                       placeholder="{{ trans('form.zip') }}">
                            </div>

                            <div class="col-12 col-sm-6 form-group">
                                <label for="inputCountry">{{ trans('form.country') }}</label>

                                <select class="custom-select" id="inputCountry" name="country">

                                    @foreach(CountryLists::getAllCountries() as $key => $value)
                                        <option value="{{ $key }}"
                                        @if($key == auth()->user()->country) {{ 'selected' }} @endif>
                                            {{ $value }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block mt-2" type="submit">
                            {{ trans('form.save_changes') }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('frontend_assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/daterangepicker.js') }}"></script>

    <script>
        $(function () {
            'use strict';

            $('#birthDate').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,
                maxDate: moment().add(0, 'days'),
            }, function (chosen_date) {
                $('#birthDate').val(chosen_date.format('YYYY-MM-DD'));
            });
        });
    </script>
@endpush
