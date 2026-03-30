@extends('layouts.app')

@section('content')
    <section class="section reset-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4 shadow-sm animate__animated animate__fadeIn" style="border-radius: 15px; background: #fff;">
                        <div class="text-center mb-4">
                            <img src="{{ asset('images/elfitra.jpeg') }}" alt="Elfitra Logo" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover; border: 3px solid #28a745;">
                        </div>
                        <h2 class="text-center mb-4 text-primary">{{ __('messages.request_password_reset') }}</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mb-4 animate__animated animate__shakeX" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-4 animate__animated animate__fadeIn" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" class="animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label text-dark">{{ __('messages.email') }}</label>
                                <input type="email" class="form-control border-success" id="email" name="email" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn main-button mb-3">{{ __('messages.send_reset_link') }}</button>
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary">{{ __('messages.back_to_login') }}</a>
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
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 3000);
            });
        });
    </script>
@endsection