<style>
    .carousel-slide {
        background-size: cover;
        background-position: center;
        transition: background 0.5s ease-in-out;
    }

    /* Slide Specific Backgrounds */
    .slide-1 {
        background: linear-gradient(135deg, rgba(0,0,0,0.7), rgba(0,0,0,0.4)),
                    url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 500"><rect fill="%23333" width="1200" height="500"/><g fill="%23555"><circle cx="300" cy="150" r="50"/><circle cx="600" cy="200" r="40"/><circle cx="900" cy="180" r="35"/></g><text x="50" y="400" fill="white" font-size="24" font-family="Arial">📺 Breaking News Scene</text></svg>');
    }

    .slide-2 {
        background: linear-gradient(135deg, rgba(0,0,0,0.7), rgba(0,0,0,0.4)),
                    url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 500"><rect fill="%23444" width="1200" height="500"/><g fill="%23666"><rect x="100" y="100" width="200" height="150" rx="10"/><rect x="400" y="80" width="150" height="180" rx="10"/><rect x="700" y="120" width="180" height="120" rx="10"/></g><text x="50" y="400" fill="white" font-size="24" font-family="Arial">🏛️ Government Summit</text></svg>');
    }

    .slide-3 {
        background: linear-gradient(135deg, rgba(0,0,0,0.7), rgba(0,0,0,0.4)),
                    url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 500"><rect fill="%232a5934" width="1200" height="500"/><g fill="%234a7c59"><circle cx="200" cy="100" r="60"/><circle cx="500" cy="150" r="45"/><circle cx="800" cy="120" r="50"/><circle cx="1000" cy="180" r="40"/></g><text x="50" y="400" fill="white" font-size="24" font-family="Arial">🌍 Climate Action</text></svg>');
    }

    /* Sliding Text */
    .carousel-slide h1 {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 0.5s, transform 0.8s;
    }

    /* Ensure title always shows with transition */
    .carousel-slide.active h1 {
        opacity: 1;
        transform: translateY(0);
    }

    /* Navigation Buttons */
    .carousel-navigation-btn {
        transition: transform 0.3s ease-in-out, background 0.3s ease-in-out;
    }

    .carousel-navigation-btn:hover {
        transform: scale(1.2);
        background: rgba(255, 255, 255, 0.8);
    }

    /* Dots Navigation */
    .carousel-dot {
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .carousel-dot:hover {
        transform: scale(1.5);
        background-color: rgba(255, 255, 255, 0.8);
    }

    /* Active dot */
    .carousel-dot.active {
        background-color: white;
    }
</style>



<div>
    <section class="relative overflow-hidden rounded-xl shadow-2xl">
        <div class="flex sm:aspect-[16/9] md:aspect-[16/6] h-full transition-transform duration-500 ease-in-out" id="carouselContainer">
            <!-- Slide 1 -->
            @foreach ($news as $index => $item)
                <div class="carousel-slide slide-1 min-w-full flex items-end {{ $index === 0 ? 'active' : '' }}">
                    <div class="p-6 sm:p-8 md:p-12 text-white max-w-2xl">
                        <div class="bg-red-500 text-white px-4 py-2 rounded-full text-sm font-bold inline-block mb-4">
                            @foreach ($item->categories as $category)
                                <span class="mr-2">{{ $category->name }}</span>
                            @endforeach
                        </div>
                        <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-bold leading-tight mb-4">
                            {{ $item->title }}
                        </h1>
                        <p class="text-base sm:text-lg md:text-xl mb-8 opacity-90 leading-relaxed">
                            {{ $item->excerpt ?? Str::limit(strip_tags($item->content), 90) }}
                        </p>
                        <a href="{{ route('news.show', $item->slug) }}" class="bg-white text-gray-800 px-8 py-3 rounded-full font-bold hover:transform hover:-translate-y-1 transition-all duration-200">
                            Read More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation Buttons -->
        <button onclick="previousSlide()"
                class="absolute top-1/2 left-5 transform -translate-y-1/2 bg-white bg-opacity-90 hover:bg-white w-12 h-12 rounded-full flex items-center justify-center text-xl text-gray-700 carousel-navigation-btn z-10">
            ‹
        </button>
        <button onclick="nextSlide()"
                class="absolute top-1/2 right-5 transform -translate-y-1/2 bg-white bg-opacity-90 hover:bg-white w-12 h-12 rounded-full flex items-center justify-center text-xl text-gray-700 carousel-navigation-btn z-10">
            ›
        </button>

        <!-- Dots Navigation -->
        <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 flex gap-3">
            <div onclick="goToSlide(0)" class="w-3 h-3 rounded-full bg-white cursor-pointer carousel-dot active"></div>
            <div onclick="goToSlide(1)" class="w-3 h-3 rounded-full bg-white bg-opacity-50 cursor-pointer carousel-dot"></div>
            <div onclick="goToSlide(2)" class="w-3 h-3 rounded-full bg-white bg-opacity-50 cursor-pointer carousel-dot"></div>
        </div>
    </section>

    <script>
        let currentSlide = 0;
        const totalSlides = 3;
        const carouselContainer = document.getElementById('carouselContainer');
        const dots = document.querySelectorAll('.carousel-dot');
        const slides = document.querySelectorAll('.carousel-slide');

        function updateCarousel() {
            const translateX = -currentSlide * 100;
            carouselContainer.style.transform = `translateX(${translateX}%)`;

            // Update dots
            dots.forEach((dot, index) => {
                if (index === currentSlide) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });

            // Add active class to the current slide to trigger the transition on the title
            slides.forEach((slide, index) => {
                if (index === currentSlide) {
                    slide.classList.add('active');
                } else {
                    slide.classList.remove('active');
                }
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
    </script>
</div>
