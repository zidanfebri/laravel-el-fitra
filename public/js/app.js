// Pastikan Bootstrap JS dimuat (sudah ada di public/js/bootstrap.bundle.min.js)

// Kustom JavaScript untuk Slider, Animasi Scroll, Animasi Angka, dan Toggle Password
document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi Slider Otomatis untuk Halaman Utama
    const imageSlider = document.getElementById('imageSlider');
    if (imageSlider) {
        new bootstrap.Carousel(imageSlider, {
            interval: 3000,
            ride: 'carousel'
        });
    }

    // Inisialisasi Slider Otomatis untuk Login
    const loginSlider = document.getElementById('loginSlider');
    if (loginSlider) {
        new bootstrap.Carousel(loginSlider, {
            interval: 3000,
            ride: 'carousel'
        });
    }

    // Animasi Scroll
    function checkScroll() {
        const elements = document.querySelectorAll('.animate__animated');
        elements.forEach(element => {
            const position = element.getBoundingClientRect();
            if (position.top < window.innerHeight - 100) {
                element.classList.add('animate__fadeInUp', 'animate__fadeInLeft', 'animate__fadeInRight');
            }
        });

        // Animasi Angka Statistik
        const statNumbers = document.querySelectorAll('.stat-number');
        statNumbers.forEach(number => {
            const position = number.parentElement.getBoundingClientRect();
            if (position.top < window.innerHeight - 100) {
                if (!number.classList.contains('animated')) {
                    const target = parseInt(number.getAttribute('data-target'));
                    let start = 0;
                    const duration = 1500;
                    const step = target / (duration / 100);
                    const counter = setInterval(() => {
                        start += step;
                        if (start >= target) {
                            clearInterval(counter);
                            number.textContent = target;
                        } else {
                            number.textContent = Math.floor(start);
                        }
                    }, 100);
                    number.classList.add('animated');
                }
            }
        });
    }

    window.addEventListener('scroll', checkScroll);
    checkScroll(); // Jalankan saat halaman dimuat

    // Toggle Password Visibility
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    if (togglePassword && password) {
        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('bi-eye-slash');
            this.classList.toggle('bi-eye');
        });
    } else {
        console.error('Toggle password elements not found');
    }

    // Manual Navigation untuk Berita
    const newsContainers = document.querySelectorAll('.news-container');
    newsContainers.forEach(container => {
        const newsGroups = container.querySelectorAll('.news-group');
        const prevBtn = container.querySelector('.news-prev');
        const nextBtn = container.querySelector('.news-next');
        const pageNumbers = container.querySelectorAll('.page-number');
        let currentGroup = 0;

        function showGroup(index) {
            newsGroups.forEach((group, i) => {
                group.style.display = i === index ? 'flex' : 'none';
            });
            pageNumbers.forEach((page, i) => {
                page.classList.toggle('active', i === index);
                page.style.color = i === index ? '#000000' : '#28a745';
                page.style.backgroundColor = i === index ? '#28a745' : 'transparent';
                page.style.borderColor = i === index ? '#28a745' : '#000000';
            });
            prevBtn.style.display = index > 0 ? 'block' : 'none';
            nextBtn.style.display = index < newsGroups.length - 1 ? 'block' : 'none';
        }

        prevBtn.addEventListener('click', () => {
            if (currentGroup > 0) {
                currentGroup--;
                showGroup(currentGroup);
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentGroup < newsGroups.length - 1) {
                currentGroup++;
                showGroup(currentGroup);
            }
        });

        pageNumbers.forEach((page, index) => {
            page.addEventListener('click', () => {
                currentGroup = index;
                showGroup(currentGroup);
            });
        });

        showGroup(currentGroup);
    });

    // Slider Otomatis untuk Testimoni
    const testimoniSlider = document.querySelector('#testimoniSlider');
    if (testimoniSlider) {
        new bootstrap.Carousel(testimoniSlider, {
            interval: 3000,
            ride: 'carousel',
            wrap: true
        });
    }
});