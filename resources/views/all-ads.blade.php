<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Second-Hand Goods Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white font-sans flex flex-col min-h-screen">

    <!-- Header -->
    @include('layouts.header')

    <!-- Main Layout -->
    <div class=" border-t border-gray-700 flex flex-grow bg-black text-white">

        <!-- Sidebar -->
        <aside class=" w-64 bg-black text-white overflow-y-auto shadow-xl">
            <div class="p-6 ">
                <h2 class=" text-2xl font-semibold mb-4 border-b-2 border-yellow-500 pb-2 text-yellow-500">Categories</h2>
                <nav>
                    <ul>
                        @foreach($categories as $category)
                        <li class="mb-6">
                            <div class="category flex justify-between items-center p-2 rounded font-semibold text-lg mb-2 text-gray-300 bg-transparent hover:bg-gray-700 cursor-pointer transition-all" data-category-id="{{ $category->id }}">
                                {{ $category->name }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                            <ul class="ml-4 mt-2">
                                @foreach($category->subcategories as $subcategory)
                                <li>
                                    <a href="javascript:void(0);" class="subcategory block p-2 text-sm text-gray-400 hover:text-gray-300 transition-all cursor-pointer ml-5" data-category-id="{{ $category->id }}" data-subcategory-id="{{ $subcategory->id }}">
                                        {{ $subcategory->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow p-8 bg-black">
            <header class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-yellow-500">Explore Products</h1>
                    <p class="text-gray-300 mt-2">Discover the best deals on second-hand goods, all in one place.</p>
                </div>

                <!-- Search Bar -->
                <div class="relative flex items-center w-1/3">
                    <input id="search-bar" type="text" class="w-full p-3 pl-12 pr-4 rounded-lg border-2 border-yellow-500 bg-black text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                           placeholder="Search products..." aria-label="Search products">
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 w-5 h-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 18l6-6m0 0a8 8 0 10-6 6m6-6a8 8 0 006-6"></path>
                    </svg>
                </div>
            </header>

            <!-- Product List -->
            <div id="product-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($categories as $category)
                @foreach($category->subcategories as $subcategory)
                @foreach($subcategory->listings as $listing)
                <div class="listing hidden bg-white rounded-lg shadow-md hover:shadow-lg overflow-hidden transform transition-transform duration-200 hover:scale-105"
     data-category-id="{{ $category->id }}"
     data-subcategory-id="{{ $subcategory->id }}">
    <a href="{{ Auth::check() ? route('listings.show', $listing->id) : route('login.show') }}">
        <img src="{{ asset('storage/' . $listing->images[0]) }}" 
             alt="{{ $listing->title }}" 
             class="w-full h-48 object-cover mb-4" />
        <div class="p-4">
            <h3 class="text-lg font-bold text-black mb-2">{{ $listing->title }}</h3> <!-- Changed to black -->
            <p class="text-black text-sm mb-4">{{ $subcategory->name }}</p> <!-- Changed to black -->
            <div class="flex items-center text-lg font-semibold text-yellow-500">
                <span class="mr-2">💰</span>
                <span class="text-black">RS {{ number_format($listing->price) }}</span> <!-- Changed to black -->
            </div>
        </div>
    </a>
</div>
                @endforeach
                @endforeach
                @endforeach
            </div>
        </main>
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categoryLinks = document.querySelectorAll('.category');
            const subcategoryLinks = document.querySelectorAll('.subcategory');
            const allListings = document.querySelectorAll('.listing');

            function hideAllListings() {
                allListings.forEach((listing) => {
                    listing.classList.add('hidden');
                });
            }

            function filterByCategory(categoryId) {
                hideAllListings();
                allListings.forEach((listing) => {
                    const listingCategory = listing.dataset.categoryId;
                    if (listingCategory === categoryId) {
                        listing.classList.remove('hidden');
                    }
                });
            }

            function filterBySubcategory(subcategoryId) {
                hideAllListings();
                allListings.forEach((listing) => {
                    const listingSubcategory = listing.dataset.subcategoryId;
                    if (listingSubcategory === subcategoryId) {
                        listing.classList.remove('hidden');
                    }
                });
            }

            function clearActiveStates() {
                categoryLinks.forEach((category) => {
                    category.classList.remove('active');
                });
                subcategoryLinks.forEach((subcategory) => {
                    subcategory.classList.remove('active');
                });
            }

            categoryLinks.forEach((category) => {
                category.addEventListener('click', function () {
                    clearActiveStates();
                    category.classList.add('active');
                    const categoryId = category.dataset.categoryId;
                    filterByCategory(categoryId);
                });
            });

            subcategoryLinks.forEach((subcategory) => {
                subcategory.addEventListener('click', function () {
                    clearActiveStates();
                    subcategory.classList.add('active');
                    const subcategoryId = subcategory.dataset.subcategoryId;
                    filterBySubcategory(subcategoryId);
                });
            });

            hideAllListings();
            allListings.forEach((listing) => {
                listing.classList.remove('hidden');
            });
        });
    </script>
</body>

</html>
