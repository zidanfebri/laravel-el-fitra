document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('#imageSlider');
    const slides = document.querySelectorAll('.carousel-item');
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            if (i === index) slide.classList.add('active');
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    // Ganti slide setiap 2 detik
    setInterval(nextSlide, 2000);

    // Inisialisasi slider
    showSlide(currentSlide);
});