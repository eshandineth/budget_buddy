<!DOCTYPE html>
<html lang="en">

<body class="bg-black text-white">

@include('layouts.header')

    <div class="container mx-auto mt-8">
        <!-- Back Button -->
        <a href="{{ url('profile') }}" class="inline-block mb-6 text-yellow-500 hover:text-yellow-600 hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Dashboard
        </a>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @foreach ($listings as $listing)
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-2xl transition-all">
                    <div class="relative">
                        @if (!empty($listing->images) && isset($listing->images[0]))
    <img class="w-full h-64 object-cover rounded-lg" src="{{ asset('storage/' . $listing->images[0]) }}" alt="{{ $listing->title }}">
@else
    <div class="w-full h-64 bg-gray-600 rounded-lg flex items-center justify-center">
        <span class="text-white">No Image Available</span>
    </div>
@endif
                    </div>
                    <div class="mt-6">
                        <h3 class="text-2xl font-semibold text-yellow-400">{{ $listing->title }}</h3>
                        <p class="text-gray-300 mt-2">{{ $listing->description }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <div class="text-gray-300">
                                <span class="font-semibold">Condition:</span> {{ $listing->condition }}
                            </div>
                            <div class="text-yellow-400 font-bold">
                                ${{ number_format($listing->price, 2) }}
                            </div>
                        </div>

                        <!-- Display Category and Subcategory -->
                        <div class="mt-2 text-gray-300">
                            <span class="font-semibold">Category:</span> <span class="text-yellow-400">{{ $listing->category->name }}</span>
                        </div>
                        <div class="text-gray-300">
                            <span class="font-semibold">Subcategory:</span> <span class="text-yellow-400">{{ $listing->subcategory->name }}</span>
                        </div>
                        
                        <!-- Button wrapper with flex -->
                        <div class="mt-6 flex justify-between gap-4">
                            <!-- Edit button -->
                            <a href="{{ route('listings.edit', $listing->id) }}" class="bg-yellow-500 text-black py-2 px-6 rounded-lg hover:bg-yellow-600 transition-all">Edit</a>

                            <!-- Delete button -->
                            <form action="{{ route('listings.destroy', $listing->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this listing?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-2 px-6 rounded-lg hover:bg-red-600 transition-all">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div><br>

@include('layouts.footer')

</body>
</html>
