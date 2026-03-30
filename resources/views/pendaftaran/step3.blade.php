@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0 mt-5">
        <div class="container">
            <h2 class="text-center mb-4">{{ __('messages.payment_title') }}</h2>
            
            {{-- Timer Countdown --}}
            <div class="card bg-danger text-white mb-4 shadow-lg">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ __('messages.payment_deadline') }}</h5>
                    <div id="countdown" class="display-4 font-weight-bold">02:00:00</div>
                </div>
            </div>
            {{-- End Timer Countdown --}}

            <div class="alert alert-info">
                <p>{{ __('messages.payment_instructions') }}</p>
                <p><strong>Nomor Rekening:</strong> {{ $paymentDetails['nomor_rekening'] }}</p>
                <p><strong>Atas Nama:</strong> {{ $paymentDetails['atas_nama'] }}</p>
                <p><strong>Jumlah:</strong> {{ $paymentDetails['formatted_nominal'] }}</p>
            </div>
            
            <form method="POST" action="{{ route('pendaftaran.payment') }}" enctype="multipart/form-data" id="paymentForm">
                @csrf
                
                {{-- Data pendaftaran sudah lengkap di session, tidak perlu hidden inputs di sini --}}
                
                <div class="mb-3">
                    <label for="bukti_pembayaran" class="form-label">{{ __('messages.payment_proof') }}</label>
                    <input type="file" class="form-control @error('bukti_pembayaran') is-invalid @enderror" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/jpeg,image/png" required>
                    @error('bukti_pembayaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success" id="submitPaymentBtn">{{ __('messages.submit_payment') }}</button>
                <a href="{{ route('pendaftaran.step5') }}" class="btn btn-secondary">{{ __('messages.kembali') }}</a>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil waktu kadaluarsa dari variabel Blade (dalam milidetik)
            const expiryTimestamp = {{ $expiryTimestamp ?? 'null' }};
            const countdownEl = document.getElementById('countdown');
            const submitBtn = document.getElementById('submitPaymentBtn');
            const paymentForm = document.getElementById('paymentForm');
            const expiryRoute = "{{ route('pendaftaran.step1') }}";

            if (!expiryTimestamp || expiryTimestamp === null) {
                countdownEl.textContent = 'Waktu tidak ditemukan.';
                submitBtn.disabled = true;
                return;
            }

            const updateCountdown = () => {
                const now = new Date().getTime();
                const distance = expiryTimestamp - now;

                if (distance < 0) {
                    clearInterval(timerInterval);
                    countdownEl.textContent = 'WAKTU KADALUARSA!';
                    submitBtn.disabled = true;
                    // Tampilkan pesan dan redirect
                    alert('{{ __('messages.registration_expired') }}');
                    window.location.href = expiryRoute;
                    return;
                }

                // Perhitungan waktu
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Format dua digit
                const formattedHours = String(hours).padStart(2, '0');
                const formattedMinutes = String(minutes).padStart(2, '0');
                const formattedSeconds = String(seconds).padStart(2, '0');

                countdownEl.textContent = `${formattedHours}:${formattedMinutes}:${formattedSeconds}`;
                
                // Tambahkan peringatan visual ketika waktu mendekati akhir
                const card = countdownEl.closest('.card');
                if (hours === 0 && minutes < 10) {
                    card.classList.remove('bg-warning');
                    card.classList.add('bg-danger');
                } else if (hours > 0 || minutes >= 10) {
                    card.classList.remove('bg-danger');
                    card.classList.add('bg-warning');
                }
            };

            // Panggil fungsi setiap detik
            const timerInterval = setInterval(updateCountdown, 1000);
            updateCountdown(); // Panggil segera agar tidak ada jeda 1 detik awal
            
            // Pencegahan akses DevTools & Klik Kanan
            document.addEventListener('contextmenu', function (e) {
                e.preventDefault();
            });
            document.addEventListener('keydown', function (e) {
                if (
                    e.key === 'F12' ||
                    (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'C' || e.key === 'J')) ||
                    (e.ctrlKey && e.key === 'U')
                ) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection
