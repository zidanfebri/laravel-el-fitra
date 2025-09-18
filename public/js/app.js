// Disable scroll restoration immediately
if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
    console.log('Scroll restoration set to manual');
}

document.addEventListener('DOMContentLoaded', function () {
    // Prevent auto-focus on page load
    if (document.activeElement !== document.body) {
        document.activeElement.blur();
        console.log('Blurred active element to prevent auto-scroll');
    }

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

    // Debounce function
    function debounce(func, wait) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
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
    }

    window.addEventListener('scroll', debounce(checkScroll, 100));

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

    // Prevent empty anchor clicks
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            if (this.getAttribute('href') === '#') {
                e.preventDefault();
                console.log('Prevented empty anchor scroll');
            }
        });
    });
});