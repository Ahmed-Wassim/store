@extends('dashboard.auth.layouts.app')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="{{ asset('dashboard/assets/images/logo.svg') }}">
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <form class="pt-3" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="name"
                                        value="{{ old('name') }}" id="exampleInputUsername1" placeholder="Username">
                                </div>
                                @if ($errors->get('name'))
                                    <ul class="fs-6 text-danger mt-2">
                                        @foreach ((array) $errors->get('name') as $error)
                                            <li class="mb-1">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                        name="email" value="{{ old('email') }}" placeholder="Email">
                                </div>
                                @if ($errors->get('email'))
                                    <ul class="fs-6 text-danger mt-2">
                                        @foreach ((array) $errors->get('email') as $error)
                                            <li class="mb-1">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password"
                                        id="exampleInputPassword1" placeholder="Password">
                                </div>
                                @if ($errors->get('password'))
                                    <ul class="fs-6 text-danger mt-2">
                                        @foreach ((array) $errors->get('password') as $error)
                                            <li class="mb-1">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password_confirmation"
                                        id="exampleInputPassword1" placeholder="Repeat Password">
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
                                <div class="mt-3">
                                    <button
                                        class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                                        type="submit">SIGN UP</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Already have an account? <a
                                        href="{{ route('login') }}" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
