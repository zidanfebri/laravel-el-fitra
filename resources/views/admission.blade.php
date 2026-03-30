@extends('layouts.app')

@section('content')
<div class="admission-page">
    <section class="section-header py-5 bg-light">
        <div class="container">
            <h2 class="text-uppercase fw-bold">{{ __('messages.admission') }}</h2>
            <p class="lead">{{ __('messages.admission_desc') ?? 'Informasi Lengkap Alur Pendaftaran Siswa Baru' }}</p>
        </div>
    </section>

    <section class="section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="fw-bold">ALUR PENDAFTARAN</h3>
                <div class="orange-line mx-auto"></div>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="alur-card active animate__animated animate__fadeIn">
                        <div class="alur-icon">
                            <i class="bi bi-display"></i>
                            <span class="step-number">01</span>
                        </div>
                        <h5>REGISTRATION</h5>
                        <p>Begin your child's journey with us by completing the online registration form provided by the school.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="alur-card animate__animated animate__fadeIn animate__delay-1s">
                        <div class="alur-icon">
                            <i class="bi bi-clipboard-check"></i>
                            <span class="step-number">02</span>
                        </div>
                        <h5>PERSONAL OBSERVATION</h5>
                        <p>Our teachers will meet and interact with your child to understand their learning style and overall development.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="alur-card animate__animated animate__fadeIn animate__delay-2s">
                        <div class="alur-icon">
                            <i class="bi bi-people"></i>
                            <span class="step-number">03</span>
                        </div>
                        <h5>LEARNING READINESS</h5>
                        <p>Students join a simple readiness test designed to see how prepared they are for school activities.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="alur-card animate__animated animate__fadeIn animate__delay-3s">
                        <div class="alur-icon">
                            <i class="bi bi-chat-dots"></i>
                            <span class="step-number">04</span>
                        </div>
                        <h5>ADMISSION REVIEW</h5>
                        <p>The admission committee conducts a comprehensive review of the test and interview results.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="alur-card animate__animated animate__fadeIn animate__delay-4s">
                        <div class="alur-icon">
                            <i class="bi bi-journal-check"></i>
                            <span class="step-number">05</span>
                        </div>
                        <h5>ADMISSION RESULTS</h5>
                        <p>We share the results with parents, along with insights gathered from the observation and assessment.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="alur-card animate__animated animate__fadeIn animate__delay-5s">
                        <div class="alur-icon">
                            <i class="bi bi-pencil-square"></i>
                            <span class="step-number">06</span>
                        </div>
                        <h5>MOU SIGNING</h5>
                        <p>Families of accepted students finalize their enrollment by signing the MOU as a shared commitment.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="alur-card animate__animated animate__fadeIn animate__delay-6s">
                        <div class="alur-icon">
                            <i class="bi bi-folder2-open"></i>
                            <span class="step-number">07</span>
                        </div>
                        <h5>ADMINISTRATION</h5>
                        <p>Families finalize enrollment by submitting the required documents and completing the administrative steps.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section py-5 bg-light">
        <div class="container">
            <div class="mb-4">
                <h3 class="fw-bold text-orange">FAQ Admission - {{ __('messages.site_name') }}</h3>
            </div>
            
            <div class="accordion border-0 shadow-sm rounded-4 overflow-hidden" id="accordionFAQ">
                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header">
                        <button class="accordion-button bg-orange text-white fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            1. Kapan pendaftaran tahun ajaran baru dibuka?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body py-4">
                            Pendaftaran dibuka setiap tahun mulai bulan Januari dan berlangsung hingga kuota terpenuhi di masing-masing unit. Proses seleksi dilakukan untuk memastikan setiap siswa dapat bertumbuh optimal dalam lingkungan belajar El Fitra.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            2. Jenjang apa saja yang tersedia di El Fitra?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body py-4">
                            Kami menyediakan jenjang pendidikan mulai dari TK, SD, SMP, hingga SMA dengan kurikulum terpadu yang menitikberatkan pada akhlak dan akademik.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            3. Bagaimana alur pendaftaran di El Fitra?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body py-4">
                            Alur pendaftaran meliputi registrasi online, observasi calon siswa, asesmen kesiapan belajar, pengumuman hasil, penandatanganan MOU, dan penyelesaian administrasi dokumen.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom faq-hidden" style="display: none;">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                            4. Apa saja dokumen yang diperlukan untuk pendaftaran?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body py-4">
                            Dokumen utama meliputi Fotokopi Akta Kelahiran, Kartu Keluarga, Ijazah terakhir (untuk jenjang SMP/SMA), dan pas foto terbaru siswa.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom faq-hidden" style="display: none;">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                            5. Apakah ada tes masuk bagi calon siswa?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body py-4">
                            Ya, terdapat asesmen kesiapan belajar dan observasi untuk memahami potensi serta kebutuhan akademik calon siswa agar kami dapat memberikan dukungan pendidikan yang tepat.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 faq-hidden" style="display: none;">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                            6. Bagaimana cara membayar biaya pendaftaran?
                        </button>
                    </h2>
                    <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body py-4">
                            Pembayaran dapat dilakukan melalui transfer bank ke rekening resmi Yayasan El Fitra yang tertera pada sistem pendaftaran online setelah Anda mengisi formulir registrasi.
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button id="btnShowMoreFAQ" class="btn btn-orange px-4 py-2 fw-bold shadow-sm">
                    Show more...
                </button>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnShowMore = document.getElementById('btnShowMoreFAQ');
        const hiddenFaqs = document.querySelectorAll('.faq-hidden');

        if (btnShowMore) {
            btnShowMore.addEventListener('click', function () {
                hiddenFaqs.forEach(faq => {
                    // Menggunakan jQuery-like animation atau CSS transition
                    if (faq.style.display === 'none') {
                        faq.style.display = 'block';
                        faq.classList.add('animate__animated', 'animate__fadeInDown');
                        btnShowMore.innerText = 'Show less';
                    } else {
                        faq.style.display = 'none';
                        btnShowMore.innerText = 'Show more...';
                    }
                });
            });
        }
    });
</script>
@endsection