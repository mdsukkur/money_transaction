<header id="header">
    <div class="container">
        <div class="header-row">
            <div class="header-column justify-content-start">

                <div class="logo">
                    <a class="d-flex" href="{{ url('/') }}" title="{{ env('APP_NAME') }}">
                        <img src="{{ asset('frontend_assets/images/logo.png') }}" width="121" height="33" alt="Payyed"/>
                    </a>
                </div>

                @auth
                    @include('frontend.layouts.menu')
                @endauth

            </div>
            <div class="header-column justify-content-end">
                <nav class="login-signup navbar navbar-expand">

                    <ul class="navbar-nav">
                        @guest
                            <li><a href="{{ route('login') }}">{{ trans('auth.login') }}</a></li>

                            <li class="align-items-center h-auto ml-sm-3">
                                <a class="btn btn-primary" href="{{ route('register') }}">
                                    {{ trans('auth.signup') }}
                                </a>
                            </li>
                        @endguest

                        @auth
                            <li class="dropdown profile ml-2">
                                <a class="px-0 dropdown-toggle" href="#">
                                    <img class="rounded-circle"
                                         src="{{ asset('frontend_assets/images/profile-thumb-sm.jpg') }}"
                                         alt="{{ auth()->user()->first_name }}">
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="text-center text-3 py-2">
                                        {{ trans('lang.hi') }}
                                        , {{ auth()->user()->first_name ." ". auth()->user()->last_name }}
                                    </li>
                                    <li class="dropdown-divider mx-n3"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.profile') }}">
                                            <i class="fas fa-user"></i>{{ trans('lang.my_profile') }}
                                        </a>
                                    </li>
                                    <li class="dropdown-divider mx-n3"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i>{{ trans('auth.signout') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endauth

                    </ul>

                </nav>
            </div>
        </div>
    </div>
</header>
