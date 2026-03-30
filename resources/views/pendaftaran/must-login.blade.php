@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">{{ __('messages.must_login') }}</h2>
        <div class="alert alert-info text-center">
            {{ __('messages.must_login_message') }}
        </div>
        <div class="text-center">
            <a href="{{ route('login') }}" class="btn btn-primary">{{ __('messages.login') }}</a>
            <a href="{{ route('home') }}" class="btn btn-secondary">{{ __('messages.back_to_home') }}</a>
        </div>
    </div>
@endsection