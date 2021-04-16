@extends('frontend.master')

@section('title', 'Transactions')

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/daterangepicker.css') }}">
@endpush

@section('content')
    <div class="container py-4">
        <div class="row">

            @include('frontend.partial_views.user.user_profile_info')

            <div class="col-lg-9">

                <h2 class="font-weight-400 mb-3">Transactions</h2>

                <!-- Filter
                ============================================= -->
                <div class="row">
                    <div class="col mb-2">
                        <form id="filterTransactions" method="post">
                            <div class="form-row">
                                <!-- Date Range
                                ========================= -->
                                <div class="col-sm-6 col-md-5 form-group">
                                    <input id="dateRange" type="text" class="form-control" placeholder="Date Range">
                                    <span class="icon-inside"><i class="fas fa-calendar-alt"></i></span> </div>
                                <!-- All Filters Link
                                ========================= -->
                                <div class="col-auto d-flex align-items-center mr-auto form-group" data-toggle="collapse"> <a class="btn-link" data-toggle="collapse" href="#allFilters" aria-expanded="false" aria-controls="allFilters">All Filters<i class="fas fa-sliders-h text-3 ml-1"></i></a> </div>
                                <!-- Statements Link
                                ========================= -->
                                <div class="col-auto d-flex align-items-center ml-auto form-group">
                                    <div class="dropdown"> <a class="text-muted btn-link" href="#" role="button" id="statements" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-download text-3 mr-1"></i>Statements</a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="statements"> <a class="dropdown-item" href="#">CSV</a> <a class="dropdown-item" href="#">PDF</a> </div>
                                    </div>
                                </div>

                                <!-- All Filters collapse
                                ================================ -->
                                <div class="col-12 collapse mb-3" id="allFilters">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="allTransactions" name="allFilters" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="allTransactions">All Transactions</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="paymentsSend" name="allFilters" class="custom-control-input">
                                        <label class="custom-control-label" for="paymentsSend">Payments Send</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="paymentsReceived" name="allFilters" class="custom-control-input">
                                        <label class="custom-control-label" for="paymentsReceived">Payments Received</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="refunds" name="allFilters" class="custom-control-input">
                                        <label class="custom-control-label" for="refunds">Refunds</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="withdrawal" name="allFilters" class="custom-control-input">
                                        <label class="custom-control-label" for="withdrawal">Withdrawal</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="deposit" name="allFilters" class="custom-control-input">
                                        <label class="custom-control-label" for="deposit">Deposit</label>
                                    </div>
                                </div>
                                <!-- All Filters collapse End -->
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Filter End -->

                <!-- All Transactions
                ============================================= -->
                <div class="bg-white shadow-sm rounded py-4 mb-4">
                    <h3 class="text-5 font-weight-400 d-flex align-items-center px-4 mb-4">All Transactions</h3>

                    @include('frontend.partial_views.transactions.index')

                    <!-- Pagination
                    ============================================= -->
                    <ul class="pagination justify-content-center mt-4 mb-0">
                        <li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a> </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"> <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a> </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item d-flex align-content-center flex-wrap text-muted text-5 mx-1">......</li>
                        <li class="page-item"><a class="page-link" href="#">15</a></li>
                        <li class="page-item"> <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a> </li>
                    </ul>
                    <!-- Paginations end -->

                </div>
                <!-- All Transactions End -->
            </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('frontend_assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/daterangepicker.js') }}"></script>
    <script>
        $(function() {
            'use strict';

            $(function() {
                var start = moment().subtract(29, 'days');
                var end = moment();
                function cb(start, end) {
                    $('#dateRange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                $('#dateRange').daterangepicker({
                    startDate: start,
                    endDate: end,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    }
                }, cb);
                cb(start, end);
            });
        });
    </script>
@endpush
