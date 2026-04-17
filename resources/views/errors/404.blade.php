@extends('app')
@section('body')
    <!-- Area Start Here -->
    <section class="error-area s-py-100 bg-overlay" style="background-image: url('assets/img/bg/error-bg.jpg');">
        <div class="container">
            <div class="error-wrapper">
                <div class="error-thumb">
                    <img src="{{ asset('assets/user') }}/img/thumb/error.png" alt="error">
                </div>
                <div class="error-content">
                    <span>Ooops ! Error</span>
                    <h2 data-aos-delay="200">404</h2>
                    <p data-aos-delay="400">Sorry Page Not Found Site Under Construction</p>
                    <div class="button" data-aos-delay="600">
                        <a class="btn" href="{{ url('/') }}"><i class="icofont-long-arrow-left"></i> Go Back to
                            Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Area End Here -->
@endsection
