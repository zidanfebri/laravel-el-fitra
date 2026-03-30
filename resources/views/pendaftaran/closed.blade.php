@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">{{ __('messages.registration_closed') }}</h2>
        <div class="alert alert-info text-center">
            {{ __('messages.registration_closed_message') }}
        </div>
        <div class="text-center">
            <a href="{{ route('home') }}" class="btn btn-primary">{{ __('messages.back_to_home') }}</a>
        </div>
    </div>
@endsection