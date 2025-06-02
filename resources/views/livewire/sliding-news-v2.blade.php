<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <div class="carousel-slide slide-1 min-w-full flex items-end">
                <div class="p-6 sm:p-8 md:p-12 text-white max-w-2xl">
                    <div class="bg-red-500 text-white px-4 py-2 rounded-full text-sm font-bold inline-block mb-4">
                        Breaking News
                    </div>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-bold leading-tight mb-4">
                        Global Summit Addresses Climate Crisis
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl mb-8 opacity-90 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non diam sit amet massa aliquet sagittis. Praesent non orci in augue pulvinar molestie ac eu ex...
                    </p>
                    <button class="bg-white text-gray-800 px-8 py-3 rounded-full font-bold hover:transform hover:-translate-y-1 transition-all duration-200">
                        Read More
                    </button>
                </div>
            </div>
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <div class="carousel-slide slide-2 min-w-full flex items-end">
                <div class="p-6 sm:p-8 md:p-12 text-white max-w-2xl">
                    <div class="bg-blue-500 text-white px-4 py-2 rounded-full text-sm font-bold inline-block mb-4">
                        Politics
                    </div>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-bold leading-tight mb-4">
                        Economic Recovery Plans Unveiled
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl mb-8 opacity-90 leading-relaxed">
                        Government officials announce comprehensive strategies to boost economic growth and create sustainable employment opportunities across multiple sectors...
                    </p>
                    <button class="bg-white text-gray-800 px-8 py-3 rounded-full font-bold hover:transform hover:-translate-y-1 transition-all duration-200">
                        Read More
                    </button>
                </div>
            </div>
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <div class="carousel-slide slide-3 min-w-full flex items-end">
                <div class="p-6 sm:p-8 md:p-12 text-white max-w-2xl">
                    <div class="bg-green-500 text-white px-4 py-2 rounded-full text-sm font-bold inline-block mb-4">
                        Environment
                    </div>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-bold leading-tight mb-4">
                        Green Technology Breakthrough
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl mb-8 opacity-90 leading-relaxed">
                        Scientists develop revolutionary clean energy solutions that could transform how we power our cities and reduce carbon emissions globally...
                    </p>
                    <button class="bg-white text-gray-800 px-8 py-3 rounded-full font-bold hover:transform hover:-translate-y-1 transition-all duration-200">
                        Read More
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
