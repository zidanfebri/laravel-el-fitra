@extends('layouts.app')

@section('content')
    <div class="container-fluid p-2">
        <div class="content-container">
        </br>
            <h1 class="text-center my-2">{{ __('messages.extra_title') }}</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card p-4">
                        <h4>{{ __('messages.extra_judul') }}</h4>
                        <p>{{ __('messages.extra') }}</p>
                        <ul>
                            <li>{{ app()->getLocale() === 'en' ? 'Science Project' : 'Proyek sains' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Robotic' : 'Robotik' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Programming' : 'Programmer' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Fun Math' : 'Permainan Matematika' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'English Class' : 'Kelas Inggris' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Arabic Class' : 'Kelas Arab' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Graphic Design' : 'Desain Grafis' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'PMR (Indonesian Red Cross)' : 'PMR (Palang Merah Indonesia)' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Futsal' : 'Futsal' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Mens volleyball' : 'Voli Putra' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Womens volleyball' : 'Voli Putri' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Basketball' : 'Basket' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Badminton' : 'Bulutangkis' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Karate' : 'Karate' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'writing class' : 'Kelas Menulis' }}</li>
                        </ul>
                        <p>{{ __('messages.extra_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</br>
@endsection