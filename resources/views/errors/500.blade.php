@extends('frontend.master')

@section('title', '500')

@section('content')
    <section class="page-header page-header-text-light bg-secondary py-5 mb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 order-1 order-md-0">
                    <h1>500 - Server Error</h1>
                </div>
                <div class="col-md-4 order-0 order-md-1">
                    <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
                        <li><a href="/">Home</a></li>
                        <li class="active">500 - Server Error</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container text-center">
            <h2 class="text-25 mb-0">500</h2>
            <h3 class="text-6 mb-3">Oops, something went wrong!.</h3>
            <p class="text-3 text-muted">Try to refresh this page or feel free to contact us if the problem
                persists.</p>
            <a href="/" class="btn btn-primary shadow-none px-5 m-2">Home</a>
            <a href="{{ url()->previous() }}" class="btn btn-outline-dark shadow-none px-5 m-2">Back</a>
        </div>
    </section>
@endsection
