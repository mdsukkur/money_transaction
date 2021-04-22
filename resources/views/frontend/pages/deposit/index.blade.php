@extends('frontend.master')

@section('title', 'Deposit')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-9 col-lg-7 col-xl-6 mx-auto">
                <div class="bg-white shadow-sm rounded p-3 pt-sm-5 pb-sm-5 px-sm-5 mb-4">

                    <!-- Deposit Money Form
                    ============================================= -->
                    <form id="form-send-money" method="post">
                        <div class="form-group">
                            <label for="youSend">Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>

                                <input type="number" class="form-control" data-bv-field="youSend" id="youSend"
                                       value="1,000" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cardType">Payment Method</label>

                            <select id="cardType" class="custom-select" required="">
                                <option value="">Select Payment Method</option>
                                <option>Credit or Debit Cards</option>
                                <option>Bank Accounts</option>
                            </select>
                        </div>
                        <p class="text-muted mt-4">Transactions fees
                            <span class="float-right d-flex align-items-center">
                                <span
                                    class="bg-info text-1 text-white font-weight-500 rounded d-inline-block px-2 line-height-4 ml-2">Free</span>
                            </span>
                        </p>
                        <hr>
                        <p class="text-4 font-weight-500">You'll deposit <span class="float-right">1,000.00 USD</span>
                        </p>
                        <button class="btn btn-primary btn-block">Continue</button>
                    </form>
                    <!-- Deposit Money Form end -->
                </div>
            </div>
        </div>
    </div>
@endsection
