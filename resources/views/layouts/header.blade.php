<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Second-Hand Goods Website</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>


<header class="flex justify-between items-center p-4 bg-black">
    <a class="flex items-center" href="{{ url('/') }}">
        <img src="{{ asset('images/buddylogo.jpg') }}" alt="Logo" class="h-20 w-auto">
    </a>
    <div class="ml-auto space-x-4 flex items-center">
        @if(Auth::check())
            <button onclick="window.location.href='{{ url('add-listing') }}'" class="bg-yellow-500 text-white py-2 px-4 rounded-lg font-semibold hover:bg-yellow-600">
                Post an Ad
            </button>
            <a href="{{ route('all.ads') }}" class="text-yellow-500 border border-yellow-500 px-4 py-2 rounded hover:bg-yellow-500 hover:text-black">
                All Ads
            </a>
            <a href="{{ url('profile') }}" class="text-yellow-500 border border-yellow-500 px-4 py-2 rounded hover:bg-yellow-500 hover:text-black">
                {{ Auth::user()->name }}
            </a>
        @else
            <button onclick="alert('Please log in to post an ad.'); window.location.href='{{ url('login') }}';" class="bg-yellow-500 text-white py-2 px-4 rounded-lg font-semibold hover:bg-yellow-600">
                Post an Ad
            </button>
            <a href="{{ route('all.ads') }}" class="text-yellow-500 border border-yellow-500 px-4 py-2 rounded hover:bg-yellow-500 hover:text-black">
                All Ads
            </a>
            <a href="{{ url('login') }}" class="text-yellow-500 border border-yellow-500 px-4 py-2 rounded hover:bg-yellow-500 hover:text-black">
                Login
            </a>
        @endif
    </div>
</header>
