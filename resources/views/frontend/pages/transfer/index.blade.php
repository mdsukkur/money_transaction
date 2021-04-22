@extends('frontend.master')

@section('title', 'Transfer')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-9 col-lg-7 col-xl-6 mx-auto">
                <div class="bg-white shadow-sm rounded p-3 pt-sm-4 pb-sm-5 px-sm-5 mb-4">
                    <h3 class="text-5 font-weight-400 mb-3 mb-sm-4">Personal Details</h3>
                    <hr class="mx-n3 mx-sm-n5 mb-4">
                    <!-- Send Money Form
                    ============================ -->
                    <form id="form-send-money" method="post">
                        <div class="form-group">
                            <label for="emailID">Recipient</label>
                            <input type="text" value="" class="form-control" data-bv-field="emailid" id="emailID" required placeholder="Enter Email Address">
                        </div>

                        <div class="form-group">
                            <label for="youSend">You Send</label>
                            <div class="input-group">
                                <div class="input-group-prepend"> <span class="input-group-text">$</span> </div>

                                <input type="text" class="form-control" data-bv-field="youSend" id="youSend" value="1,000" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="recipientGets">Recipient Gets</label>
                            <div class="input-group">
                                <div class="input-group-prepend"> <span class="input-group-text">$</span> </div>

                                <input type="text" class="form-control" data-bv-field="recipientGets" id="recipientGets" value="1,410.06" placeholder="">
                            </div>
                        </div>
                        <hr>
                        <p>Total Fees <span class="float-right">7.21 USD</span></p>
                        <hr>
                        <p class="text-4 font-weight-500">Total To Pay<span class="float-right">1,000.00 USD</span></p>
                        <button class="btn btn-primary btn-block">Continue</button>
                    </form>
                    <!-- Send Money Form end -->
                </div>
            </div>
        </div>
    </div>
@endsection
