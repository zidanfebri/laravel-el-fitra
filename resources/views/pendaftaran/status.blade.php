@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0 mt-5">
        <div class="container">
            <h2 class="text-center mb-4 section-header">
                {{ __('messages.status_title') }}
            </h2>

            @if (session('success'))
                <div class="toast-container position-fixed top-0 end-0 p-3">
                    <div class="toast animate__animated animate__fadeInUp" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                        <div class="toast-header bg-success text-white">
                            <img src="{{ asset('images/elfitra.jpeg') }}" alt="{{ __('messages.site_name') }}" width="20" class="me-2 rounded-circle">
                            <strong class="me-auto">{{ __('messages.site_name') }}</strong>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body text-dark">
                            {{ session('success') }}
                            <div class="mt-2 text-end">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="toast">{{ __('messages.ok') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="card status-card shadow-sm rounded-lg">
                <div class="card-body text-center p-5">
                    <div class="status-icon mb-4">
                        @if ($pendaftaran->status === 'siswa')
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                        @elseif ($pendaftaran->status === 'sukses')
                            <i class="bi bi-hourglass-split text-warning" style="font-size: 3rem;"></i>
                        @else
                            <i class="bi bi-exclamation-triangle text-secondary" style="font-size: 3rem;"></i>
                        @endif
                    </div>

                    @if ($pendaftaran->status === 'sukses')
                        <p class="lead text-warning fw-bold">{{ __('messages.waiting_verification') }}</p>
                        <p class="text-muted">{{ __('messages.verification_info') }}</p>
                    @elseif ($pendaftaran->status === 'siswa')
                        <p class="lead text-success fw-bold">{{ __('messages.welcome_student', ['jenjang' => $pendaftaran->jenjang, 'tahun_ajaran' => $pendaftaran->tahunAjaran->tahun_ajaran]) }}</p>
                        <p class="text-muted">{{ __('messages.student_info') }}</p>
                    @else
                        <p class="lead text-secondary fw-bold">{{ __('messages.status_pending') }}</p>
                        <p class="text-muted">{{ __('messages.pending_info') }}</p>
                    @endif

                    <div class="status-details mt-4">
                        <p class="mb-2"><strong>{{ __('messages.name') }}:</strong> {{ $pendaftaran->nama_siswa }}</p>
                        <p class="mb-2"><strong>{{ __('messages.jenjang') }}:</strong> {{ $pendaftaran->jenjang }}</p>
                        <p class="mb-2"><strong>{{ __('messages.status') }}:</strong> <span class="badge bg-{{ $pendaftaran->status === 'siswa' ? 'success' : ($pendaftaran->status === 'sukses' ? 'warning' : 'secondary') }}">{{ $pendaftaran->status }}</span></p>
                    </div>

                    <a href="{{ route('home') }}" class="btn main-button mt-4">
                        <i class="bi bi-house-door me-2"></i>{{ __('messages.back_to_home') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toastEl = document.querySelector('.toast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl);
                toast.show();

                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        toast.hide();
                    }
                });
            }

            // Animasi card saat load
            const statusCard = document.querySelector('.status-card');
            statusCard.classList.add('animate__animated', 'animate__fadeInUp');
        });
    </script>
@endsection