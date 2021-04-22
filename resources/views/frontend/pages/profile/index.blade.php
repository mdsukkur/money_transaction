@php
    use App\Helpers\CountryLists;
    use App\Helpers\StateLists;
    use App\Helpers\BankLists;
@endphp

@extends('frontend.master')

@section('title', 'Profile')

@section('content')
    <div class="container py-4">
        <div class="row">

            @include('response.index')

            @include('frontend.partial_views.user.user_profile_info')

            <div class="col-lg-9">

                <!--============================== Personal Details ==============================-->
                <div class="bg-white shadow-sm rounded p-4 mb-4">
                    <h3 class="text-5 font-weight-400 d-flex align-items-center mb-4">{{ trans('lang.per_details') }}
                        <a href="{{ route('user.edit.profile') }}" class="ml-auto text-2 text-uppercase btn-link">
                            <span class="mr-1"><i class="fas fa-edit"></i></span>{{ trans('lang.edit') }}</a></h3>
                    <hr class="mx-n4 mb-4">

                    <div class="form-row align-items-center">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">{{ trans('lang.name') }}:</p>
                        <p class="col-sm-9 text-3">{{ auth()->user()->first_name ." ". auth()->user()->last_name }}</p>
                    </div>

                    <div class="form-row align-items-center">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">{{ trans('lang.email_id') }}:</p>
                        <p class="col-sm-9 text-3">{{ auth()->user()->email }}</p>
                    </div>

                    <div class="form-row align-items-center">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">{{ trans('lang.phone') }}:</p>
                        <p class="col-sm-9 text-3">{{ auth()->user()->phone }}</p>
                    </div>

                    @if(!is_null(auth()->user()->birth_date))
                        <div class="form-row align-items-center">
                            <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">
                                {{ trans('lang.birth_date') }}:</p>
                            <p class="col-sm-9 text-3">{{ date('d-m-Y', strtotime(auth()->user()->birth_date)) }}</p>
                        </div>
                    @endif

                    <div class="form-row align-items-baseline">
                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">{{ trans('lang.address') }}:</p>
                        <p class="col-sm-9 text-3">
                            @if(!empty(auth()->user()->address) && !empty(auth()->user()->city))
                                {{ auth()->user()->address }},<br>
                                {{ auth()->user()->city }},<br>
                                {{ StateLists::getAllStates(auth()->user()->state) ." - " .auth()->user()->zip_code }},
                                <br>
                            @endif

                            {{ CountryLists::getAllCountries(auth()->user()->country) }}.</p>
                    </div>
                </div>
                <!--============================== Personal Details End ==============================-->

                <!--=============================== Change Password ===============================-->
                <div class="bg-white shadow-sm rounded p-4 mb-4">
                    <h3 class="text-5 font-weight-400 d-flex align-items-center mb-4">{{ trans('lang.change_password') }}
                        <a href="{{ route('user.password') }}" class="ml-auto text-2 text-uppercase btn-link">
                            <span class="mr-1"><i class="fas fa-edit"></i></span>{{ trans('lang.change') }}</a></h3>
                    <hr class="mx-n4 mb-4">
                    <p class="text-3">{{ trans('lang.pass_create') }} - <span class="text-muted">{{ trans('lang.last_changed') }}:
                            {{ date('d M, Y', strtotime(auth()->user()->last_password_changed ?? auth()->user()->created_at)) }}</span>
                    </p>
                </div>
                <!--=============================== Change Password End ===============================-->

                <!--================================ Bank Accounts ================================-->
                <div class="bg-white shadow-sm rounded p-4 mb-4">
                    <h3 class="text-5 font-weight-400 mb-4">{{ trans('lang.bank_info') }}
                        <span class="text-muted text-4">{{ trans('lang.bank_info_purpose') }}</span></h3>

                    <hr class="mb-4 mx-n4">

                    <div class="row">
                        <!--++++++++++++++++ Bank Account Lists ++++++++++++++++-->
                        @foreach(auth()->user()->bankInformations as $bank)
                            <div class="col-12 col-sm-6">
                                <div class="account-card account-card-primary text-white rounded mb-4 mb-lg-0">
                                    <div class="row no-gutters">
                                        <div class="col-3 d-flex justify-content-center p-3">
                                            <div class="my-auto text-center">
                                            <span class="text-13">
                                                <i class="fas fa-university"></i>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="col-9 border-left">
                                            <div class="py-4 my-2 pl-4">
                                                <p class="text-4 font-weight-500 mb-1">
                                                    {{ BankLists::getAllBanks($bank->bank_name) }}
                                                </p>
                                                <p class="text-4 opacity-9 mb-1">
                                                    XXXXXXXXXXXX-{{ substr($bank->account_number, -4) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="account-card-overlay rounded">
                                        <a href="#" class="text-light btn-link mx-2 bank-account-details"
                                           data-id="{{ $bank->id }}">
                                            <span class="mr-1"><i class="fas fa-share"></i></span>More Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                    @endforeach

                    <!--++++++++++++++++ Add New Bank Account Button ++++++++++++++++-->
                        <div class="col-12 col-sm-6">
                            <a href="" data-target="#add-new-bank-account" data-toggle="modal"
                               class="account-card-new d-flex align-items-center rounded h-100 p-3 mb-4 mb-lg-0">
                                <p class="w-100 text-center line-height-4 m-0">
                                    <span class="text-3">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>
                                    <span class="d-block text-body text-3">Add New Bank Account</span>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="bank-account-details" class="modal fade" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered transaction-details" role="document">
                    </div>
                </div>

                <div id="add-new-bank-account" class="modal fade" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-400">{{ trans('form.add_bank_acnt') }}</h5>
                                <button type="button" class="close font-weight-400" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body p-4">
                                <form id="addbankaccount" method="post" action="{{ route('bankinfo.store') }}">
                                    @csrf

                                    <div class="mb-3">

                                        @foreach(BankLists::getAccountType() as $key => $value)
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input id="{{ $value }}" name="account_type" required type="radio"
                                                       value="{{ $key }}" class="custom-control-input"
                                                @if($key == 1) {{"checked"}} @endif>
                                                <label class="custom-control-label" for="{{ $value }}">
                                                    {{ $value }}
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>

                                    <div class="form-group">
                                        <label for="bankName">{{ trans('form.bank_name') }}</label>
                                        <select class="custom-select" id="bankName" name="bank_name">

                                            @foreach(BankLists::getAllBanks() as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="accountName">{{ trans('form.ac_name') }}</label>
                                        <input type="text" class="form-control" id="accountName" required
                                               name="account_name" placeholder="e.g. Smith Rhodes">
                                    </div>

                                    <div class="form-group">
                                        <label for="accountNumber">{{ trans('form.ac_number') }}</label>
                                        <input type="number" class="form-control" name="account_number"
                                               id="accountNumber" required value=""
                                               placeholder="e.g. 12346678900001">
                                    </div>

                                    <div class="form-group">
                                        <label for="routing">{{ trans('form.routing_number') }}</label>
                                        <input type="number" class="form-control" name="routing_number" id="routing"
                                               required placeholder="e.g. 9739739">
                                    </div>

                                    <button class="btn btn-primary btn-block" type="submit">
                                        {{ trans('form.add_bank_acnt') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--================================ Bank Accounts End ================================-->

                @include('frontend.partial_views.user.bank.delete_bank_info')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            'use strict';

            $(document).on('click', '.bank-account-details', function () {
                var el_id = $(this).attr('data-id');
                openBankInfoModal(el_id);
            });

            $(document).on('click', '.remove-bankinfo', function () {
                var el_id = $(this).attr('data-id');
                $('#delete-bank-account-details form').attr('action', "{{ route('bankinfo.destroy', '') }}" + `/${el_id}`);
                $('#bank-account-details').modal('hide');
                $('#delete-bank-account-details').modal('show');

                $('#delete-bank-account-details').on('hidden.bs.modal', function () {
                    openBankInfoModal(el_id);
                })
            });

            function openBankInfoModal(el_id) {
                $.get("{{ route('bankinfo.show', '') }}" + `/${el_id}`, function (data) {
                    $('#bank-account-details .modal-dialog').html(data);
                    $('#bank-account-details').modal('show');
                });
            }
        });
    </script>
@endpush
