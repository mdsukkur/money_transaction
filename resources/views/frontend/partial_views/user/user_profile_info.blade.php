<aside class="col-lg-3">

    <!--=============================== Profile Details ===============================-->
    <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
        <div class="profile-thumb mt-3 mb-4">
            <img class="rounded-circle" src="{{ userProfilePicture(auth()->id(), auth()->user()->picture ?? null, 100) }}"
                 alt="{{ auth()->user()->first_name }}">
        </div>
        <p class="text-3 font-weight-500 mb-2">
            {{ trans('lang.hello') }}, {{ auth()->user()->first_name ." ". auth()->user()->last_name }}
        </p>

        @if(Route::currentRouteName() != 'user.profile')
            <p class="mb-2">
                <a href="{{ route('user.profile') }}" class="text-5 text-light" data-toggle="tooltip"
                   title="{{ trans('lang.edit_profile') }}">
                    <i class="fas fa-edit"></i>
                </a>
            </p>
        @endif
    </div>
    <!--=============================== Profile Details End ===============================-->

    <!--=============================== Available Balance ===============================-->
    <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
        <div class="text-17 text-light my-3"><i class="fas fa-wallet"></i></div>
        <h3 class="text-9 font-weight-400">${{ auth()->user()->current_balance }}</h3>
        <p class="mb-2 text-muted opacity-8">{{ trans('lang.balance') }}</p>
        <hr class="mx-n3">
        <div class="d-flex">
            <a href="{{ route('withdraw.index') }}" class="btn-link mr-auto">{{ trans('lang.withdraw') }}</a>
            <a href="{{ route('deposit.index') }}" class="btn-link ml-auto">{{ trans('lang.deposit') }}</a>
        </div>
    </div>
    <!--=============================== Available Balance End ===============================-->

</aside>
