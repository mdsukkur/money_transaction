@extends('frontend.master')

@section('title', 'Money Transfer')

@section('content')
    <!-- Slideshow
        ============================================= -->
    <div class="owl-carousel owl-theme single-slideshow" data-autoplay="true" data-loop="true"
         data-autoheight="true" data-nav="true" data-items="1">
        <div class="item">
            <section class="hero-wrap">
                <div class="hero-mask opacity-7 bg-dark"></div>
                <div class="hero-bg" style="background-image:url('frontend_assets/images/banner/image-1.jpg');"></div>
                <div class="hero-content d-flex fullscreen-with-header py-5">
                    <div class="container my-auto text-center">
                        <h2 class="text-16 text-white">Send & Receive Money</h2>
                        <p class="text-5 text-white mb-4">Quickly and easily send, receive and request money online
                            with Payyed.<br class="d-none d-lg-block">
                            Over 180 countries and 120 currencies supported.</p>

                        @guest
                            <a href="{{ route('register') }}" class="btn btn-primary m-2">Open a Free Account</a>
                        @endguest

                        <a class="btn btn-outline-light video-btn m-2" href="#"
                           data-src="https://www.youtube.com/embed/7e90gBu4pas" data-toggle="modal"
                           data-target="#videoModal"><span class="text-2 mr-3"><i class="fas fa-play"></i></span>See
                            How it Works</a></div>
                </div>
            </section>
        </div>
        <div class="item">
            <section class="hero-wrap">
                <div class="hero-bg" style="background-image:url('frontend_assets/images/banner/image-3.jpg');"></div>
                <div class="hero-content d-flex fullscreen-with-header py-5">
                    <div class="container my-auto">
                        <div class="row">
                            <div class="col-12 col-lg-8 col-xl-7 text-center text-lg-left">
                                <h2 class="text-13 text-white">Trusted by more than 50,000 businesses
                                    worldwide.</h2>
                                <p class="text-5 text-white mb-4">Over 180 countries and 120 currencies
                                    supported.</p>

                                @guest
                                    <a href="{{ route('register') }}" class="btn btn-primary mr-3">Get started for
                                        free</a>
                                @endguest

                                <a class="btn btn-link text-light video-btn" href="#"
                                   data-src="https://www.youtube.com/embed/7e90gBu4pas" data-toggle="modal"
                                   data-target="#videoModal"><span class="mr-2"><i
                                            class="fas fa-play-circle"></i></span>Watch
                                    Demo</a></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- Slideshow end -->

    <!-- Why choose
    ============================================= -->
    <section class="section bg-white">
        <div class="container">
            <h2 class="text-9 text-center">Why should you choose Payyed?</h2>
            <p class="lead text-center mb-5">Here’s Top 4 reasons why using a Payyed account for manage your
                money.</p>
            <div class="row">
                <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="featured-box">
                        <div class="featured-box-icon text-primary"><i class="fas fa-hand-pointer"></i></div>
                        <h3>Easy to use</h3>
                        <p class="text-3">Lisque persius interesset his et, in quot quidam persequeris vim, ad mea
                            essent possim iriure.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="featured-box">
                        <div class="featured-box-icon text-primary"><i class="fas fa-share"></i></div>
                        <h3>Faster Payments</h3>
                        <p class="text-3">Persius interesset his et, in quot quidam persequeris vim, ad mea essent
                            possim iriure.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-5 mb-sm-0">
                    <div class="featured-box">
                        <div class="featured-box-icon text-primary"><i class="fas fa-dollar-sign"></i></div>
                        <h3>Lower Fees</h3>
                        <p class="text-3">Essent lisque persius interesset his et, in quot quidam persequeris vim,
                            ad mea essent possim iriure.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="featured-box">
                        <div class="featured-box-icon text-primary"><i class="fas fa-lock"></i></div>
                        <h3>100% secure</h3>
                        <p class="text-3">Quidam lisque persius interesset his et, in quot quidam persequeris vim,
                            ad mea essent possim iriure.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why choose end -->

    <!-- What can you do
    ============================================= -->
    <section class="section bg-white">
        <div class="container">
            <h2 class="text-9 text-center">What can you do with Payyed?</h2>
            <p class="lead text-center mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting
                industry.</p>
            <div class="row">
                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="featured-box style-5 rounded">
                        <div class="featured-box-icon text-primary"><i class="fas fa-share-square"></i></div>
                        <h3>Send Money</h3>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="featured-box style-5 rounded">
                        <div class="featured-box-icon text-primary"><i class="fas fa-check-square"></i></div>
                        <h3>Receive Money</h3>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="featured-box style-5 rounded">
                        <div class="featured-box-icon text-primary"><i class="fas fa-user-friends"></i></div>
                        <h3>Pay a Friend</h3>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="featured-box style-5 rounded">
                        <div class="featured-box-icon text-primary"><i class="fas fa-shopping-bag"></i></div>
                        <h3>Online Shopping</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- What can you do end -->

    <!-- How work
    ============================================= -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card bg-dark-3 shadow-sm border-0">
                        <img class="card-img opacity-8" src="{{ asset('frontend_assets/images/how-work.jpg') }}"
                             width="570" height="362" alt="banner">
                        <div class="card-img-overlay p-0">
                            <a class="d-flex h-100 video-btn" href="#"
                               data-src="https://www.youtube.com/embed/7e90gBu4pas"
                               data-toggle="modal" data-target="#videoModal"> <span
                                    class="btn-video-play bg-white shadow-md rounded-circle m-auto"><i
                                        class="fas fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="ml-4">
                        <h2 class="text-9">How does it work?</h2>
                        <p class="text-4">Quidam lisque persius interesset his et, in quot quidam persequeris essent
                            possim iriure. Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.</p>
                        <ul class="list-unstyled text-3 line-height-5">
                            <li><i class="fas fa-check mr-2"></i>Sign Up Account</li>
                            <li><i class="fas fa-check mr-2"></i>Receive & Send Payments from worldwide</li>
                            <li><i class="fas fa-check mr-2"></i>Your funds will be transferred to your local bank
                                account
                            </li>
                        </ul>

                        @guest
                            <a href="{{ route('register') }}" class="btn btn-outline-primary shadow-none mt-2">
                                Open a Free Account
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How work end -->

    <!-- Video Modal
============================================= -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bg-transparent border-0">
                <button type="button" class="close text-white opacity-10 ml-auto mr-n3 font-weight-400"
                        data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="modal-body p-0">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" id="video" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal end -->
@endsection
