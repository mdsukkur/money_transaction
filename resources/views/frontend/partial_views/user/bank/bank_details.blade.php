@php
    use App\Helpers\BankLists;
@endphp

<div class="modal-content">
    <div class="modal-body">
        <div class="row no-gutters">
            <div
                class="col-sm-5 d-flex justify-content-center bg-primary rounded-left py-4">
                <div class="my-auto text-center">
                    <div class="text-17 text-white mb-3"><i class="fas fa-university"></i>
                    </div>
                    <h3 class="text-6 text-white my-3">{{ BankLists::getAllBanks($bank->bank_name) }}</h3>
                    <div class="text-4 text-white my-4">XXX-{{ substr($bank->account_number, -4) }}</div>
                </div>
            </div>
            <div class="col-sm-7">
                <h5 class="text-5 font-weight-400 m-3">Bank Account Details
                    <button type="button" class="close font-weight-400" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </h5>
                <hr>
                <div class="px-3">
                    <ul class="list-unstyled">
                        <li class="font-weight-500">Account Type:</li>
                        <li class="text-muted">{{ BankLists::getAccountType($bank->account_type) }}</li>
                    </ul>
                    <ul class="list-unstyled">
                        <li class="font-weight-500">Account Name:</li>
                        <li class="text-muted">{{ $bank->account_name }}</li>
                    </ul>
                    <ul class="list-unstyled">
                        <li class="font-weight-500">Account Number:</li>
                        <li class="text-muted">XXXXXXXXXXXX-{{ substr($bank->account_number, -4) }}</li>
                    </ul>
                    <ul class="list-unstyled">
                        <li class="font-weight-500">Routing Number:</li>
                        <li class="text-muted">{{ $bank->routing_number }}</li>
                    </ul>
                    <p>
                        <button type="button" data-id="{{ $bank->id }}"
                                class="btn btn-sm btn-outline-danger btn-block shadow-none remove-bankinfo">
                            <span class="mr-1"><i class="fas fa-minus-circle"></i></span>Delete Account
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
