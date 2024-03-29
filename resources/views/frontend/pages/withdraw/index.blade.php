@extends('frontend.master')

@section('title', 'Withdraw')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-9 col-lg-7 col-xl-6 mx-auto">
                <!-- Withdraw Money Form
              ============================================= -->
                <div class="bg-white shadow-sm rounded p-3 pt-sm-5 pb-sm-5 px-sm-5 mb-4">
                    <div class="text-center bg-primary p-4 rounded mb-4">
                        <h3 class="text-10 text-white font-weight-400">${{ auth()->user()->current_balance }}</h3>
                        <p class="text-white">Available Balance</p>
                    </div>

                    <form id="form-send-money" method="post">
                        <div class="form-group">
                            <label for="withdrawto">Withdraw to</label>
                            <select id="withdrawto" class="custom-select" required="">
                                <option value="">HDFC Bank - XXXXXXXXXXXX-9025</option>
                                <option>Bank A/c 2 - XXXXXX-1211</option>
                                <option>Bank A/c 3 - XXXXXX-2011</option>
                                <option>Bank A/c 4 - XXXXXX-2011</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="youSend">Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                <input type="text" class="form-control" data-bv-field="youSend" id="youSend"
                                       value="1,000" placeholder="">
                            </div>
                        </div>

                        <p class="text-muted mt-4">Transactions fees
                            <span class="float-right d-flex align-items-center">5.00 USD</span>
                        </p>
                        <hr>
                        <p class="text-3 font-weight-500">Amount to Withdraw
                            <span class="float-right">1,000.00 USD</span>
                        </p>

                        <button class="btn btn-primary btn-block">Continue</button>
                    </form>
                </div>
                <!-- Withdraw Money Form end -->
            </div>
        </div>
    </div>
@endsection
