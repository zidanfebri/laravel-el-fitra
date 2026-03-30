@extends('layouts.app')
@section('content')
<div class="container-fluid p-0 mt-5">
    <div class="container">
        <h2 class="text-center mb-4">{{ __('messages.step5_title') }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('pendaftaran.step5') }}" enctype="multipart/form-data">
            @csrf
            {{-- Hidden inputs dari session tidak diperlukan lagi --}}

            <div class="mb-3">
                <label for="akte" class="form-label">{{ __('messages.akte') }}</label>
                <input type="file" class="form-control" name="akte" accept="application/pdf" required>
            </div>
            <div class="mb-3">
                <label for="kk" class="form-label">{{ __('messages.kk') }}</label>
                <input type="file" class="form-control" name="kk" accept="application/pdf" required>
            </div>

            @if(($pendaftaran->jenis_pendaftaran ?? null) === 'pindahan')
                <div class="mb-3">
                    <label for="mutasi" class="form-label">{{ __('messages.mutasi') }}</label>
                    <input type="file" class="form-control" name="mutasi" accept="application/pdf" required>
                </div>
            @endif

            <div class="mb-3">
                <label for="transkip1" class="form-label">{{ __('messages.transkip1') }}</label>
                <input type="file" class="form-control" name="transkip1" accept="application/pdf" required>
            </div>
            <div class="mb-3">
                <label for="transkip2" class="form-label">{{ __('messages.transkip2') }}</label>
                <input type="file" class="form-control" name="transkip2" accept="application/pdf" required>
            </div>
            <div class="mb-3">
                <label for="transkip3" class="form-label">{{ __('messages.transkip3') }}</label>
                <input type="file" class="form-control" name="transkip3" accept="application/pdf" required>
            </div>
            <div class="mb-3">
                <label for="transkip4" class="form-label">{{ __('messages.transkip4') }}</label>
                <input type="file" class="form-control" name="transkip4" accept="application/pdf" required>
            </div>
            <div class="mb-3">
                <label for="transkip5" class="form-label">{{ __('messages.transkip5') }}</label>
                <input type="file" class="form-control" name="transkip5" accept="application/pdf" required>
            </div>
            <a href="{{ route('pendaftaran.step3') }}" class="btn btn-secondary"> {{ __('messages.kembali') }} </a>
            <button type="submit" class="btn btn-success">
            {{ __('messages.next') }}
            </button>
        </form>
    </div>
</div>
@endsection