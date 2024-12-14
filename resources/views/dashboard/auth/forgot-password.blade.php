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
                            <form method="POST" class="pt-3" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="email">
                                </div>
                                @if ($errors->get('email'))
                                    <ul class="fs-6 text-danger mt-2">
                                        @foreach ((array) $errors->get('email') as $error)
                                            <li class="mb-1">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="mt-3">
                                    <button
                                        class="btn btn-block btn-gradient-secondary btn-lg font-weight-medium auth-form-btn"
                                        type="submit">Email Password Reset Link</button>
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
