<!--============================== Collapse Button ==============================-->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav">
    <span></span> <span></span> <span></span></button>
<!--============================== Collapse Button end ==============================-->

<nav class="primary-menu navbar navbar-expand-lg">
    <div id="header-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="{{ (Route::currentRouteName() == 'user.dashboard') ? 'active' : '' }}">
                <a href="{{ route('user.dashboard') }}">{{ trans('lang.dashboard') }}</a>
            </li>

            <li class="{{ (Route::currentRouteName() == 'deposit.index') ? 'active' : '' }}">
                <a href="{{ route('deposit.index') }}">{{ trans('lang.deposit') }}</a>
            </li>

            <li class="{{ (Route::currentRouteName() == 'transfer.index') ? 'active' : '' }}">
                <a href="{{ route('transfer.index') }}">{{ trans('lang.transfer') }}</a>
            </li>

            <li class="{{ (Route::currentRouteName() == 'withdraw.index') ? 'active' : '' }}">
                <a href="{{ route('withdraw.index') }}">{{ trans('lang.withdraw') }}</a>
            </li>

            <li class="{{ (Route::currentRouteName() == 'user.transactions') ? 'active' : '' }}">
                <a href="{{ route('user.transactions') }}">{{ trans('lang.transactions') }}</a>
            </li>
        </ul>
    </div>
</nav>
