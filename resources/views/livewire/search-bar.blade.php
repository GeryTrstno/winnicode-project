<form class="max-w-lg mx-auto" action="{{ route('news.index') }}" method="GET">
    <div class="flex">
        <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
        <button id="dropdown-button" data-dropdown-toggle="dropdown" class="shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-1 focus:outline-none focus:ring-gray-100 dark:bg-zinc-800 dark:hover:bg-zinc-700 dark:focus:ring-zinc-500 dark:text-white dark:border-zinc-500 ease-in-out duration-300" type="button">All categories <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 border rounded-lg shadow-sm w-44 dark:bg-zinc-900 dark:border-zinc-500">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 dark:border-zinc-900" aria-labelledby="dropdown-button">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('category.show', $category->slug) }}" class=" block px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700 dark:hover:text-white dark:bg-zinc-900 dark:border-zinc-900">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="relative w-full">
            <input type="search" name="search" id="search-dropdown" class="block p-2.5 w-96 md-64 z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-1 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:border-s-gray-700  dark:border-zinc-500 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Article" required />
            <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-zinc-900 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-zinc-300 dark:bg-zinc-800 dark:hover:bg-zinc-700 dark:focus:ring-zinc-500 dark:border-zinc-500">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
    </div>
</form>
