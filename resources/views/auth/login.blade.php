@extends('layouts.app')

@section('content')
    
    <section class="section login-section">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-md-6 p-0">
                    <div id="loginSlider" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="3000">
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
                        <button class="carousel-control-prev" type="button" data-bs-target="#loginSlider" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{ __('messages.previous') }}</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#loginSlider" data-bs-slide="next">
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
                        <h2 class="text-center mb-4 text-primary animate__animated animate__fadeInUp">{{ __('messages.login') }}</h2>

                        @if ($errors->has('username'))
                            <div class="alert alert-danger alert-dismissible fade show mb-4 animate__animated animate__shakeX" role="alert" id="errorAlert">
                                {{ $errors->first('username') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label text-dark">{{ __('messages.username') }}</label>
                                <input type="text" class="form-control login-input border-success" id="username" name="username" value="{{ old('username') }}" required>
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="password" class="form-label text-dark">{{ __('messages.password') }}</label>
                                <input type="password" class="form-control login-input border-success" id="password" name="password" required>
                                <span class="password-toggle">
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </span>
                                <div id="passwordHelpBlock" class="form-text text-muted">
                                    {{ __('messages.password_help') }}
                                </div>
                            </div>
                            <div class="mb-3 text-end">
                                <a href="{{ route('password.request') }}" class="text-success fw-bold">{{ __('messages.forgot_password') }}</a>
                            </div>
                            <button type="submit" class="btn main-button w-100 mb-3">{{ __('messages.login') }}</button>
                            <div class="text-center">
                                <p class="text-muted">{{ __('messages.no_account') }} <a href="{{ route('register') }}" class="text-success fw-bold">{{ __('messages.register') }}</a></p>
                            </div>
                        </form>
                        <p class="text-center mt-3 text-muted">© 2025 El-Fitra. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                    const alertInstance = bootstrap.Alert.getInstance(errorAlert);
                    if (alertInstance) {
                         alertInstance.close();
                    } else {
                        errorAlert.remove();
                    }
                }, 3000);
            }

            // Check if user is already authenticated and redirect to dashboard
            fetch('{{ route('check-auth') }}', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.authenticated && data.role === 'admin') {
                    window.location.href = "{{ route('admin.data-siswa') }}";
                }
            })
            .catch(error => console.error('Error checking auth status:', error));
        });
    </script>
@endsection