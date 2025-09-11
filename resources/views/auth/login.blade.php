@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0 login-container">
        <div class="col-md-6 p-0 login-slider-container">
            <div id="loginSlider" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/el.jpeg') }}" class="d-block w-100 login-slider-image" alt="Slider 1" loading="lazy">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/fit.jpeg') }}" class="d-block w-100 login-slider-image" alt="Slider 2" loading="lazy">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/ra.jpeg') }}" class="d-block w-100 login-slider-image" alt="Slider 3" loading="lazy">
                    </div>
                </div>
            </div>
        </div>

        <!-- Sisi Kanan (Form Login) -->
        <div class="col-md-6 d-flex justify-content-center align-items-center p-4 login-form-container">
            <div class="login-form w-100">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/elfitra.jpeg') }}" alt="Elfitra Logo" class="login-logo">
                </div>
                <h2 class="text-center mb-4">Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control login-input" id="username" name="username" required>
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control login-input" id="password" name="password" required>
                        <span class="password-toggle">
                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                        </span>
                        <div id="passwordHelpBlock" class="form-text">
                            Your password must be 8-20 characters long
                        </div>
                    </div>
                    <div class="mb-3 text-end">
                        <a href="{{ route('reset.form') }}">Lupa Password?</a>
                    </div>
                    <button type="submit" class="btn btn-success w-100 mb-3">Login</button>
                </form>
                <p class="text-center mt-3">© 2025 El-Fitra. All rights reserved.</p>
            </div>
        </div>
    </div>
@endsection