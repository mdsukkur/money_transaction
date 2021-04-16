<!--=============================== Title ===============================-->
<div class="transaction-title py-2 px-4">
    <div class="row font-weight-00">
        <div class="col-2 col-sm-1 text-center"><span class="">{{ trans('lang.date') }}</span></div>
        <div class="col col-sm-7">{{ trans('lang.desc') }}</div>
        <div class="col-auto col-sm-2 d-none d-sm-block text-center">{{ trans('lang.status') }}</div>
        <div class="col-3 col-sm-2 text-right">{{ trans('lang.amount') }}</div>
    </div>
</div>
<!--=============================== Title End ===============================-->

<!--=============================== Transaction List ===============================-->
<div class="transaction-list">
    <div class="transaction-item px-4 py-3" data-toggle="modal" data-target="#transaction-detail">
        <div class="row align-items-center flex-row">
            <div class="col-2 col-sm-1 text-center"><span
                    class="d-block text-4 font-weight-300">16</span> <span
                    class="d-block text-1 font-weight-300 text-uppercase">APR</span></div>
            <div class="col col-sm-7"><span class="d-block text-4">HDFC Bank</span> <span
                    class="text-muted">Withdraw to Bank account</span></div>
            <div class="col-auto col-sm-2 d-none d-sm-block text-center text-3"><span
                    class="text-warning" data-toggle="tooltip" data-original-title="In Progress"><i
                        class="fas fa-ellipsis-h"></i></span></div>
            <div class="col-3 col-sm-2 text-right text-4"><span class="text-nowrap">- $562</span>
                <span class="text-2 text-uppercase">(USD)</span></div>
        </div>
    </div>
    <div class="transaction-item px-4 py-3" data-toggle="modal" data-target="#transaction-detail">
        <div class="row align-items-center flex-row">
            <div class="col-2 col-sm-1 text-center"><span
                    class="d-block text-4 font-weight-300">15</span> <span
                    class="d-block text-1 font-weight-300 text-uppercase">APR</span></div>
            <div class="col col-sm-7"><span class="d-block text-4">Envato Pty Ltd</span> <span
                    class="text-muted">Payment Received</span></div>
            <div class="col-auto col-sm-2 d-none d-sm-block text-center text-3"><span
                    class="text-success" data-toggle="tooltip" data-original-title="Completed"><i
                        class="fas fa-check-circle"></i></span></div>
            <div class="col-3 col-sm-2 text-right text-4"><span class="text-nowrap">+ $562</span>
                <span class="text-2 text-uppercase">(USD)</span></div>
        </div>
    </div>
    <div class="transaction-item px-4 py-3" data-toggle="modal" data-target="#transaction-detail">
        <div class="row align-items-center flex-row">
            <div class="col-2 col-sm-1 text-center"><span
                    class="d-block text-4 font-weight-300">04</span> <span
                    class="d-block text-1 font-weight-300 text-uppercase">APR</span></div>
            <div class="col col-sm-7"><span class="d-block text-4">HDFC Bank</span> <span
                    class="text-muted">Withdraw to Bank account</span></div>
            <div class="col-auto col-sm-2 d-none d-sm-block text-center text-3"><span
                    class="text-success" data-toggle="tooltip" data-original-title="Completed"><i
                        class="fas fa-check-circle"></i></span></div>
            <div class="col-3 col-sm-2 text-right text-4"><span class="text-nowrap">- $106</span>
                <span class="text-2 text-uppercase">(USD)</span></div>
        </div>
    </div>
    <div class="transaction-item px-4 py-3" data-toggle="modal" data-target="#transaction-detail">
        <div class="row align-items-center flex-row">
            <div class="col-2 col-sm-1 text-center"><span
                    class="d-block text-4 font-weight-300">28</span> <span
                    class="d-block text-1 font-weight-300 text-uppercase">MAR</span></div>
            <div class="col col-sm-7"><span class="d-block text-4">Patrick Cary</span> <span
                    class="text-muted">Refund</span></div>
            <div class="col-auto col-sm-2 d-none d-sm-block text-center text-3"><span
                    class="text-success" data-toggle="tooltip" data-original-title="Completed"><i
                        class="fas fa-check-circle"></i></span></div>
            <div class="col-3 col-sm-2 text-right text-4"><span class="text-nowrap">+ $60</span>
                <span class="text-2 text-uppercase">(USD)</span></div>
        </div>
    </div>
    <div class="transaction-item px-4 py-3" data-toggle="modal" data-target="#transaction-detail">
        <div class="row align-items-center flex-row">
            <div class="col-2 col-sm-1 text-center"><span
                    class="d-block text-4 font-weight-300">28</span> <span
                    class="d-block text-1 font-weight-300 text-uppercase">MAR</span></div>
            <div class="col col-sm-7"><span class="d-block text-4">Patrick Cary</span> <span
                    class="text-muted">Payment Sent</span></div>
            <div class="col-auto col-sm-2 d-none d-sm-block text-center text-3"><span
                    class="text-danger" data-toggle="tooltip" data-original-title="Cancelled"><i
                        class="fas fa-times-circle"></i></span></div>
            <div class="col-3 col-sm-2 text-right text-4"><span class="text-nowrap">- $60</span>
                <span class="text-2 text-uppercase">(USD)</span></div>
        </div>
    </div>
    <div class="transaction-item px-4 py-3" data-toggle="modal" data-target="#transaction-detail">
        <div class="row align-items-center flex-row">
            <div class="col-2 col-sm-1 text-center"><span
                    class="d-block text-4 font-weight-300">16</span> <span
                    class="d-block text-1 font-weight-300 text-uppercase">FEB</span></div>
            <div class="col col-sm-7"><span class="d-block text-4">HDFC Bank</span> <span
                    class="text-muted">Withdraw to Bank account</span></div>
            <div class="col-auto col-sm-2 d-none d-sm-block text-center text-3"><span
                    class="text-success" data-toggle="tooltip" data-original-title="Completed"><i
                        class="fas fa-check-circle"></i></span></div>
            <div class="col-3 col-sm-2 text-right text-4"><span class="text-nowrap">- $1498</span>
                <span class="text-2 text-uppercase">(USD)</span></div>
        </div>
    </div>
    <div class="transaction-item px-4 py-3" data-toggle="modal" data-target="#transaction-detail">
        <div class="row align-items-center flex-row">
            <div class="col-2 col-sm-1 text-center"><span
                    class="d-block text-4 font-weight-300">15</span> <span
                    class="d-block text-1 font-weight-300 text-uppercase">FEB</span></div>
            <div class="col col-sm-7"><span class="d-block text-4">Envato Pty Ltd</span> <span
                    class="text-muted">Payment Received</span></div>
            <div class="col-auto col-sm-2 d-none d-sm-block text-center text-3"><span
                    class="text-success" data-toggle="tooltip" data-original-title="Completed"><i
                        class="fas fa-check-circle"></i></span></div>
            <div class="col-3 col-sm-2 text-right text-4"><span class="text-nowrap">+ $1498</span>
                <span class="text-2 text-uppercase">(USD)</span></div>
        </div>
    </div>
</div>
<!-- Transaction List End -->

<!-- Transaction Item Details Modal
=========================================== -->
<div id="transaction-detail" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered transaction-details" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row no-gutters">
                    <div class="col-sm-5 d-flex justify-content-center bg-primary rounded-left py-4">
                        <div class="my-auto text-center">
                            <div class="text-17 text-white my-3"><i class="fas fa-building"></i></div>
                            <h3 class="text-4 text-white font-weight-400 my-3">Envato Pty Ltd</h3>
                            <div class="text-8 font-weight-500 text-white my-4">$557.20</div>
                            <p class="text-white">15 March 2020</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <h5 class="text-5 font-weight-400 m-3">Transaction Details
                            <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        </h5>
                        <hr>
                        <div class="px-3">
                            <ul class="list-unstyled">
                                <li class="mb-2">Payment Amount <span class="float-right text-3">$562.00</span></li>
                                <li class="mb-2">Fee <span class="float-right text-3">-$4.80</span></li>
                            </ul>
                            <hr class="mb-2">
                            <p class="d-flex align-items-center font-weight-500 mb-4">Total Amount <span class="text-3 ml-auto">$557.20</span></p>
                            <ul class="list-unstyled">
                                <li class="font-weight-500">Paid By:</li>
                                <li class="text-muted">Envato Pty Ltd</li>
                            </ul>
                            <ul class="list-unstyled">
                                <li class="font-weight-500">Transaction ID:</li>
                                <li class="text-muted">26566689645685976589</li>
                            </ul>
                            <ul class="list-unstyled">
                                <li class="font-weight-500">Description:</li>
                                <li class="text-muted">Envato March 2020 Member Payment</li>
                            </ul>
                            <ul class="list-unstyled">
                                <li class="font-weight-500">Status:</li>
                                <li class="text-muted">Completed<span class="text-success text-3 ml-1"><i class="fas fa-check-circle"></i></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Transaction Item Details Modal End -->
