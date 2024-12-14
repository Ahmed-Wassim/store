@extends('dashboard.layouts.app')

@section('crumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Overview</li>
@endsection
