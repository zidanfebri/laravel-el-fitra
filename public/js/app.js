if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
    console.log('Scroll restoration set to manual');
}

document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM fully loaded at', new Date().toLocaleString());

    // Prevent auto-focus on page load
    if (document.activeElement !== document.body) {
        document.activeElement.blur();
        console.log('Blurred active element to prevent auto-scroll');
    }

    // Initialize Slider for Main Page
    const imageSlider = document.getElementById('imageSlider');
    if (imageSlider) {
        try {
            new bootstrap.Carousel(imageSlider, {
                interval: 3000,
                ride: 'carousel'
            });
            console.log('Image slider initialized');
        } catch (error) {
            console.error('Error initializing image slider:', error);
        }
    } else {
        console.log('Image slider not found');
    }

    // Initialize Slider for Login
    const loginSlider = document.getElementById('loginSlider');
    if (loginSlider) {
        try {
            new bootstrap.Carousel(loginSlider, {
                interval: 3000,
                ride: 'carousel'
            });
            console.log('Login slider initialized');
        } catch (error) {
            console.error('Error initializing login slider:', error);
        }
    } else {
        console.log('Login slider not found');
    }

    // Debounce function
    function debounce(func, wait) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }

    // Scroll Animation
    function checkScroll() {
        const elements = document.querySelectorAll('.animate__animated');
        elements.forEach(element => {
            const position = element.getBoundingClientRect();
            if (position.top < window.innerHeight - 100) {
                element.classList.add('animate__fadeInUp');
            }
        });
    }

    window.addEventListener('scroll', debounce(checkScroll, 100));

    // Navigation for News and Testimonials
    const newsContainers = document.querySelectorAll('.news-container');
    console.log(`Found ${newsContainers.length} news containers`);

    if (newsContainers.length === 0) {
        console.error('No news containers found. Check if .news-container elements exist in the DOM.');
    }

    newsContainers.forEach((container, containerIndex) => {
        const section = container.getAttribute('data-section') || `container-${containerIndex}`;
        const newsGroups = container.querySelectorAll('.news-group');
        const prevBtn = container.querySelector('.news-prev');
        const nextBtn = container.querySelector('.news-next');
        const pageNumbers = container.querySelectorAll('.page-number');
        let currentGroup = 0;

        console.log(`${section}: Found ${newsGroups.length} groups`);
        console.log(`${section}: Previous button: ${prevBtn ? 'found' : 'not found'}`);
        console.log(`${section}: Next button: ${nextBtn ? 'found' : 'not found'}`);
        console.log(`${section}: Page numbers: ${pageNumbers.length} found`);

        function updateNavigation() {
            try {
                newsGroups.forEach((group, i) => {
                    group.style.display = i === currentGroup ? 'flex' : 'none';
                    group.classList.toggle('active', i === currentGroup);
                });
                pageNumbers.forEach((page, i) => {
                    page.classList.toggle('active', i === currentGroup);
                });
                if (prevBtn) {
                    prevBtn.style.display = currentGroup === 0 ? 'none' : 'block';
                    prevBtn.disabled = currentGroup === 0;
                }
                if (nextBtn) {
                    nextBtn.style.display = currentGroup === newsGroups.length - 1 ? 'none' : 'block';
                    nextBtn.disabled = currentGroup === newsGroups.length - 1;
                }
                console.log(`${section}: Showing group ${currentGroup + 1} of ${newsGroups.length}`);
            } catch (error) {
                console.error(`${section}: Error in updateNavigation:`, error);
            }
        }

        if (newsGroups.length > 1) {
            // Event listener for Previous button
            if (prevBtn) {
                prevBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log(`${section}: Previous button clicked`);
                    if (currentGroup > 0) {
                        currentGroup--;
                        updateNavigation();
                        console.log(`${section}: Navigated to group ${currentGroup + 1}`);
                    } else {
                        console.log(`${section}: Already at first group`);
                    }
                });
            } else {
                console.error(`${section}: Previous button (.news-prev) not found in DOM`);
            }

            // Event listener for Next button
            if (nextBtn) {
                nextBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log(`${section}: Next button clicked`);
                    if (currentGroup < newsGroups.length - 1) {
                        currentGroup++;
                        updateNavigation();
                        console.log(`${section}: Navigated to group ${currentGroup + 1}`);
                    } else {
                        console.log(`${section}: Already at last group`);
                    }
                });
            } else {
                console.error(`${section}: Next button (.news-next) not found in DOM`);
            }

            // Event listener for page numbers
            pageNumbers.forEach((page, index) => {
                page.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log(`${section}: Page number ${index + 1} clicked`);
                    currentGroup = index;
                    updateNavigation();
                    console.log(`${section}: Navigated to group ${currentGroup + 1}`);
                });
            });

            updateNavigation();
        } else {
            if (prevBtn) prevBtn.style.display = 'none';
            if (nextBtn) nextBtn.style.display = 'none';
            console.log(`${section}: Only one group or no groups, hiding navigation buttons`);
        }
    });

    // Prevent empty anchor clicks
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            if (this.getAttribute('href') === '#') {
                e.preventDefault();
                console.log('Prevented empty anchor scroll');
            }
        });
    });

    // Statistik Animation
    const statNumbers = document.querySelectorAll('.stat-number');
    const animateStats = () => {
        statNumbers.forEach(number => {
            const target = parseInt(number.getAttribute('data-target'));
            let current = 0;
            const increment = target / 100;
            const updateNumber = () => {
                if (current < target) {
                    current += increment;
                    number.textContent = Math.floor(current).toLocaleString();
                    requestAnimationFrame(updateNumber);
                } else {
                    number.textContent = target.toLocaleString();
                }
            };
            updateNumber();
        });
    };

    // Intersection Observer for stats
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateStats();
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    const statistikSection = document.getElementById('statistik');
    if (statistikSection) {
        statsObserver.observe(statistikSection);
        console.log('Statistik section observed');
    } else {
        console.log('Statistik section not found');
    }

    // Animate on scroll for other sections
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.section, .hero-area').forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(20px)';
        section.style.transition = 'all 0.6s ease';
        observer.observe(section);
    });
});