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

            <li class="{{ (Route::currentRouteName() == 'user.deposit') ? 'active' : '' }}">
                <a href="{{ route('user.deposit') }}">{{ trans('lang.deposit') }}</a>
            </li>

            <li class="{{ (Route::currentRouteName() == 'user.transfer') ? 'active' : '' }}">
                <a href="{{ route('user.transfer') }}">{{ trans('lang.transfer') }}</a>
            </li>

            <li class="{{ (Route::currentRouteName() == 'user.withdraw') ? 'active' : '' }}">
                <a href="{{ route('user.withdraw') }}">{{ trans('lang.withdraw') }}</a>
            </li>

            <li class="{{ (Route::currentRouteName() == 'user.transactions') ? 'active' : '' }}">
                <a href="{{ route('user.transactions') }}">{{ trans('lang.transactions') }}</a>
            </li>
        </ul>
    </div>
</nav>
