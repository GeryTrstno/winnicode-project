    let currentSlide = 0;
    const totalSlides = 3;
    const carouselContainer = document.getElementById('carouselContainer');
    const dots = document.querySelectorAll('.carousel-dot');
    function updateCarousel() {
        const translateX = -currentSlide * 100;
        carouselContainer.style.transform = `translateX(${translateX}%)`;

        // Update dots
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
    }
    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
    }
    function previousSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateCarousel();
    }
    function goToSlide(slideIndex) {
        currentSlide = slideIndex;
        updateCarousel();
    }
    // Auto-slide every 5 seconds
    setInterval(nextSlide, 5000);
    // Touch/swipe support
    let startX = 0;
    let startY = 0;
    let isSwipeDetected = false;
    carouselContainer.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
        isSwipeDetected = false;
    });
    carouselContainer.addEventListener('touchmove', (e) => {
        if (!startX || !startY) return;
        const currentX = e.touches[0].clientX;
        const currentY = e.touches[0].clientY;
        const diffX = startX - currentX;
        const diffY = startY - currentY;
        if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 50) {
            isSwipeDetected = true;
            if (diffX > 0) {
                nextSlide();
            } else {
                previousSlide();
            }
        }
    });
    carouselContainer.addEventListener('touchend', () => {
        startX = 0;
        startY = 0;
    });
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            previousSlide();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
        }
    });
