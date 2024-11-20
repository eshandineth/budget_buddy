<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $listing->title }} - Second-Hand Goods</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white font-sans flex flex-col min-h-screen">
    <!-- Header -->
    @include('layouts.header')

    <div class="border-t border-gray-700 flex flex-grow p-8">
        <!-- Back Button -->
        <a href="{{ route('all.ads') }}" class="inline-block mb-6 text-yellow-500 hover:text-yellow-600 hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to All Ads
        </a>
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-10">
            <!-- Product Image Section -->
            <div class="flex-shrink-0 w-full md:w-1/2">
                <div class="relative w-full h-96 rounded-xl overflow-hidden shadow-lg transition-transform transform hover:scale-105">
                    <img src="{{ asset('storage/' . $listing->images[0]) }}" alt="{{ $listing->title }}" class="w-full h-full object-cover rounded-xl">
                </div>
                <div class="mt-4 flex gap-4 overflow-x-auto">
                    @foreach($listing->images as $image)
                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $listing->title }}" class="w-24 h-24 object-cover rounded-lg shadow-md cursor-pointer transition-transform transform hover:scale-110">
                    @endforeach
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="flex flex-col w-full md:w-1/2 bg-black text-white p-8 rounded-xl shadow-lg border-4 border-yellow-500">
                <h1 class="text-4xl font-extrabold mb-2">{{ $listing->title }}</h1>
                <p class="text-lg font-medium">{{ $listing->category->name }} / {{ $listing->subcategory->name }}</p>
                <p class="text-sm mt-2">{{ $listing->condition }}</p>
                <p class="text-sm mt-2">{{ $listing->product_history ?? 'No product history available' }}</p>
                
                <div class="flex items-center mt-6 space-x-3">
                    <span class="text-xl font-semibold text-yellow-500">💰 Rs. {{ number_format($listing->price) }}</span>
                </div>

                <div class="mt-8">
                    <h3 class="text-2xl font-semibold mb-4">Description</h3>
                    <p class="leading-relaxed">{{ $listing->description }}</p>
                </div>

                <!-- Seller Information -->
                <div class="mt-6 bg-black p-6 rounded-lg shadow-lg border-2 border-yellow-500">
                    <h3 class="text-3xl font-bold text-yellow-500 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a8 8 0 10-16 0v2h5m2-5a4 4 0 110-8 4 4 0 010 8z"></path>
                        </svg>
                        Seller Information
                    </h3>
                    <p class="text-lg mb-2"><strong>👤 Seller:</strong> {{ $listing->user->name ?? 'N/A' }}</p>
                    <p class="text-lg mb-2"><strong>📞 Contact:</strong> {{ $listing->contact_number }}</p>
                    <p class="text-lg mb-2"><strong>📍 District:</strong> {{ $listing->district }}</p>
                    <p class="text-lg"><strong>🏙️ City:</strong> {{ $listing->city }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer')

</body>

</html>
