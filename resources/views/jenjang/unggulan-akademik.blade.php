@extends('layouts.app')

@section('content')
    <div class="container-fluid p-2">
        <div class="content content-container">
            <h1 class="text-center my-4">{{ __('messages.academic_title') }}</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card p-4">
                        <h4>{{ __('messages.academic_judul') }}</h4>
                        <p>{{ __('messages.academic') }}</p>
                        <ul>
                            <li>{{ app()->getLocale() === 'en' ? 'National Curriculum' : 'Kurikulum nasional' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Research and Based learning' : 'Penelitian dan Pembelajaran Berbasis Mesin' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Science Project' : 'Proyek Sains' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Robotic' : 'Robotik' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Fun math' : 'Matematika yang menyenangkan' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'UTBK SNBT & TKA Tutoring' : 'Bimbel UTBK SNBT & TKA' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'OSN Tutoring' : 'Bimbingan OSN' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'El Fitra Expo & Competition' : 'El-Fitra Expo & Kompetisi' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Class Competition' : 'Kompetisi kelas' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Literacy Stage' : 'Pentas Literasi' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Field Trip & Outing Class' : 'Kelas Studi Lapangan & Jalan-jalan' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Guest Teacher' : 'Guru Tamu' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Counseling guidance' : 'Bimbingan Konseling' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Healty Student' : 'Robotik' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Outbond' : 'Robotik' }}</li>
                        </ul>
                        <p>{{ __('messages.academic_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </br>
@endsection