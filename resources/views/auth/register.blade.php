@extends('site.layouts.app')

@section('title')
    Wesso - Register
@endsection

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Registration</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index-2.html"><i class="lni lni-home"></i> Home</a></li>
                        <li>Registration</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Account Register Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="register-form">
                        <div class="title">
                            <h3>No Account? Register</h3>
                            <p>Registration takes less than a minute but gives you full control over your orders.</p>
                        </div>
                        <form class="pt-3" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-fn">Name</label>
                                    <input class="form-control" type="text" name="name" id="reg-fn" required>
                                </div>
                            </div>
                            @if ($errors->get('name'))
                                <ul class="fs-6 text-danger mt-2">
                                    @foreach ((array) $errors->get('name') as $error)
                                        <li class="mb-1">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-email">E-mail Address</label>
                                    <input class="form-control" name="email" type="email" id="reg-email" required>
                                </div>
                            </div>
                            @if ($errors->get('email'))
                                <ul class="fs-6 text-danger mt-2">
                                    @foreach ((array) $errors->get('email') as $error)
                                        <li class="mb-1">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-pass">Password</label>
                                    <input class="form-control" name="password" type="password" id="reg-pass" required>
                                </div>
                            </div>
                            @if ($errors->get('password'))
                                <ul class="fs-6 text-danger mt-2">
                                    @foreach ((array) $errors->get('password') as $error)
                                        <li class="mb-1">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-pass-confirm">Confirm Password</label>
                                    <input class="form-control" name="password_confirmation" type="password"
                                        id="reg-pass-confirm" required>
                                </div>
                            </div>
                            @if ($errors->get('password_confirmation'))
                                <ul class="fs-6 text-danger mt-2">
                                    @foreach ((array) $errors->get('password_confirmation') as $error)
                                        <li class="mb-1">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="mb-4">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input" name="terms" value="yes">
                                        I
                                        agree to
                                        all Terms &
                                        Conditions </label>
                                </div>
                            </div>
                            @if ($errors->get('terms'))
                                <ul class="fs-6 text-danger mt-2">
                                    @foreach ((array) $errors->get('terms') as $error)
                                        <li class="mb-1">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="button">
                                <button class="btn" type="submit">Register</button>
                            </div>
                        </form>
                        <p class="outer-link">Already have an account? <a href="{{ route('login') }}">Login Now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Register Area -->
@endsection
