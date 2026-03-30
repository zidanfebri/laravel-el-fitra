@extends('layouts.app')

@section('content')
    <section class="section login-section">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-md-6 p-0">
                    <div id="registerSlider" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner h-100">
                            <div class="carousel-item active h-100">
                                <img src="{{ asset('images/el.jpeg') }}" class="d-block w-100 h-100 login-slider-image" alt="Slider 1" loading="lazy">
                            </div>
                            <div class="carousel-item h-100">
                                <img src="{{ asset('images/fit.jpeg') }}" class="d-block w-100 h-100 login-slider-image" alt="Slider 2" loading="lazy">
                            </div>
                            <div class="carousel-item h-100">
                                <img src="{{ asset('images/ra.jpeg') }}" class="d-block w-100 h-100 login-slider-image" alt="Slider 3" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#registerSlider" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{ __('messages.previous') }}</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#registerSlider" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{ __('messages.next') }}</span>
                        </button>
                    </div>
                </div>

                <div class="col-md-6 d-flex justify-content-center align-items-center p-4 bg-white">
                    <div class="login-form w-100">
                        <div class="text-center mb-4 animate__animated animate__fadeIn">
                            <img src="{{ asset('images/elfitra.jpeg') }}" alt="Elfitra Logo" class="login-logo rounded-circle">
                        </div>
                        <h2 class="text-center mb-4 text-primary animate__animated animate__fadeInUp">{{ __('messages.register') }}</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mb-4 animate__animated animate__shakeX" role="alert" id="errorAlert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}" class="animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="nama" class="form-label text-dark">{{ __('messages.name') }}</label>
                                <input type="text" class="form-control login-input border-success @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label text-dark">WhatsApp Number (Username)</label>
                                <input type="text" class="form-control login-input border-success @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="Contoh: 62812345678" required>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label text-dark">{{ __('messages.email') }}</label>
                                <input type="email" class="form-control login-input border-success @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 position-relative">
                                <label for="password" class="form-label text-dark">{{ __('messages.password') }}</label>
                                <input type="password" class="form-control login-input border-success @error('password') is-invalid @enderror" id="password" name="password" required>
                                <span class="password-toggle" style="position: absolute; right: 10px; top: 38px; cursor: pointer; z-index: 10;">
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </span>
                                <div id="passwordHelpBlock" class="form-text text-muted">
                                    {{ __('messages.password_help') }}
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label text-dark fw-bold">Send Activation Link via:</label>
                                <div class="d-flex gap-3 mt-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="activation_method" id="act_email" value="email" checked>
                                        <label class="form-check-label" for="act_email">Email</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="activation_method" id="act_wa" value="whatsapp">
                                        <label class="form-check-label" for="act_wa">WhatsApp</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn main-button w-100 mb-3">{{ __('messages.register') }}</button>
                            
                            <div class="text-center">
                                <p class="text-muted">{{ __('messages.no_account') }} <a href="{{ route('login') }}" class="text-success fw-bold">Login</a></p>
                            </div>
                        </form>
                        <p class="text-center mt-3 text-muted">© 2025 El-Fitra. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password toggle functionality
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');

            if (togglePassword && passwordInput) {
                togglePassword.addEventListener('click', function () {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    this.classList.toggle('bi-eye');
                    this.classList.toggle('bi-eye-slash');
                });
            }

            // Auto-dismiss error alert after 3 seconds
            const errorAlert = document.getElementById('errorAlert');
            if (errorAlert) {
                setTimeout(() => {
                    const bsAlert = bootstrap.Alert.getOrCreateInstance(errorAlert);
                    bsAlert.close();
                }, 3000);
            }
        });
    </script>
@endsection