@extends('frontend.master')

@section('title', 'Dashboard')

@section('content')
    <div class="container py-4">
        <div class="row">

            @include('frontend.partial_views.user.user_profile_info')

            <div class="col-lg-9">
                <div class="bg-white shadow-sm rounded py-4 mb-4">
                    <h3 class="text-5 font-weight-400 d-flex align-items-center px-4 mb-4">{{ trans('lang.recent_activity') }}</h3>

                    @include('frontend.partial_views.transactions.index')

                    <!--=============================== View all Link ===============================-->
                    <div class="text-center mt-4">
                        <a href="{{ route('user.transactions') }}" class="btn-link text-3">{{ trans('lang.view_all') }}
                            <i class="fas fa-chevron-right text-2 ml-2"></i>
                        </a>
                    </div>
                    <!--=============================== View all Link End ===============================-->

                </div>

            </div>
        </div>
    </div>
@endsection
