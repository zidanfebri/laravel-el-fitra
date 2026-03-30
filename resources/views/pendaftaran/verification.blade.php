@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">{{ __('messages.verification_title') }}</h2>
        <div class="alert alert-info text-center">
            {{ __('messages.verification_message') }}
            <br>
            {{ __('messages.contact_admin') }} <a href="https://wa.me/6285793526478" target="_blank">WhatsApp</a>.
        </div>
        <div class="text-center">
            <a href="{{ route('home') }}" class="btn btn-primary">{{ __('messages.back_to_home') }}</a>
        </div>
    </div>
@endsection