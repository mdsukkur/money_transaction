<aside class="col-lg-3">

    <!--=============================== Profile Details ===============================-->
    <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
        <div class="profile-thumb mt-3 mb-4">
            <img class="rounded-circle" src="{{ asset('frontend_assets/images/profile-thumb.jpg') }}"
                 alt="{{ auth()->user()->first_name }}">
            <div class="profile-thumb-edit custom-file bg-primary text-white" data-toggle="tooltip"
                 title="Change Profile Picture">
                <i class="fas fa-camera position-absolute"></i>
                <input type="file" class="custom-file-input" id="customFile">
            </div>
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
            <a href="{{ route('user.withdraw') }}" class="btn-link mr-auto">{{ trans('lang.withdraw') }}</a>
            <a href="{{ route('user.deposit') }}" class="btn-link ml-auto">{{ trans('lang.deposit') }}</a>
        </div>
    </div>
    <!--=============================== Available Balance End ===============================-->

</aside>
