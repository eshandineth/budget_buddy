<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Second-Hand Goods Website</title>

</head>
<body class=" bg-black text-white font-sans">

  <!-- Include Header -->
  @include('layouts.header')

  <!-- Image Slider -->
  <section class="relative mt-6 h-96 w-full overflow-hidden">
    <div class="slides flex transition-transform duration-500 ease-in-out" id="slides">
      <!-- Slide 1 -->
      <div class="w-full h-full flex-shrink-0">
        <img src="{{ asset('images/slider1.jpg') }}" alt="Slide 1" class="w-full h-full object-cover">
      </div>
      <!-- Slide 2 -->
      <div class="w-full h-full flex-shrink-0">
        <img src="{{ asset('images/slider2.jpg') }}" alt="Slide 2" class="w-full h-full object-cover">
      </div>
      <!-- Slide 3 -->
      <div class="w-full h-full flex-shrink-0">
        <img src="{{ asset('images/slider3.jpg') }}" alt="Slide 3" class="w-full h-full object-cover">
      </div>
      <!-- Slide 4 -->
      <div class="w-full h-full flex-shrink-0">
        <img src="{{ asset('images/slider4.jpg') }}" alt="Slide 4" class="w-full h-full object-cover">
      </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="absolute inset-0 flex items-center justify-between px-4">
      <button id="prev" aria-label="Previous slide" class="text-white bg-black bg-opacity-50 hover:bg-opacity-75 p-2 rounded-full">&#10094;</button>
      <button id="next" aria-label="Next slide" class="text-white bg-black bg-opacity-50 hover:bg-opacity-75 p-2 rounded-full">&#10095;</button>
    </div>
  </section>

<script>
  let currentIndex = 0;
  const slides = document.getElementById('slides');
  const slideCount = document.querySelectorAll('#slides > div').length;

  // Function to show the current slide
  function showSlide(index) {
    if (index >= slideCount) currentIndex = 0;
    if (index < 0) currentIndex = slideCount - 1;
    slides.style.transform = `translateX(-${currentIndex * 100}%)`;
  }

  // Next slide function
  function nextSlide() {
    currentIndex++;
    showSlide(currentIndex);
  }

  // Previous slide function
  function prevSlide() {
    currentIndex--;
    showSlide(currentIndex);
  }

  // Event listeners for manual navigation
  document.getElementById('next').addEventListener('click', nextSlide);
  document.getElementById('prev').addEventListener('click', prevSlide);

  // Initialize the first slide
  showSlide(currentIndex);
</script>

  
  

  <!-- Welcome Section -->
<section class=" text-center my-10">
    <h1 class="text-4xl font-bold text-yellow-500">
      Welcome to <span class="text-white">Your Second-Hand Treasure Hunt</span>
    </h1>
    <p class="mt-4 text-lg text-gray-400 max-w-lg mx-auto">
      Discover quality items at unbeatable prices and give pre-loved items a new home!
    </p>
  </section>

  <!-- Search Bar -->
  <section class="flex justify-center mt-6">
    <div class="w-3/4 flex">
      <input type="text" placeholder="Search for items..." class="w-full p-4 rounded-l-md bg-white text-black">
      <button class="bg-yellow-500 text-black px-6 py-4 rounded-r-md hover:bg-yellow-600">Search</button>
    </div>
  </section>




<!-- Categories Section -->
<section class="my-12 px-4">
    <h2 class="text-3xl font-bold text-yellow-500 text-center mb-12">
        <span class="text-white">Shop by</span> Category
    </h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
      
      <!-- Furniture Card -->
      <div class="group relative overflow-hidden rounded-xl bg-gray-100 shadow-lg">
        <img src="{{ asset('images/Cfurniture.jpg') }}" alt="Furniture" class="w-full h-64 object-cover blur-xs">
        <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center p-6">
          <h3 class="text-4xl font-poppins font-bold text-white text-center drop-shadow-lg">Furniture</h3>
        </div>
      </div>
  
      <!-- Appliances Card -->
      <div class="group relative overflow-hidden rounded-xl bg-gray-100 shadow-lg">
        <img src="{{ asset('images/Cappliances.jpg') }}" alt="Appliances" class="w-full h-64 object-cover blur-xs">
        <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center p-6">
          <h3 class="text-4xl font-poppins font-bold text-white text-center drop-shadow-lg">Appliances</h3>
        </div>
      </div>
  
      <!-- Electronics Card -->
      <div class="group relative overflow-hidden rounded-xl bg-gray-100 shadow-lg">
        <img src="{{ asset('images/Celectronics.jpg') }}" alt="Electronics" class="w-full h-64 object-cover blur-xs">
        <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center p-6">
          <h3 class="text-4xl font-poppins font-bold text-white text-center drop-shadow-lg">Electronics</h3>
        </div>
      </div>
  
      <!-- Kitchenware Card -->
      <div class="group relative overflow-hidden rounded-xl bg-gray-100 shadow-lg">
        <img src="{{ asset('images/Ckitchenware.jpg') }}" alt="Kitchenware" class="w-full h-64 object-cover blur-xs">
        <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center p-6">
          <h3 class="text-4xl font-poppins font-bold text-white text-center drop-shadow-lg">Kitchenware</h3>
        </div>
      </div>
  
      <!-- Decor Card -->
      <div class="group relative overflow-hidden rounded-xl bg-gray-100 shadow-lg">
        <img src="{{ asset('images/Cdecor.jpg') }}" alt="Decor" class="w-full h-64 object-cover blur-xs">
        <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center p-6">
          <h3 class="text-4xl font-poppins font-bold text-white text-center drop-shadow-lg">Decor</h3>
        </div>
      </div>
  
      <!-- Outdoor & Garden Card -->
      <div class="group relative overflow-hidden rounded-xl bg-gray-100 shadow-lg">
        <img src="{{ asset('images/Coutdoor.jpg') }}" alt="Outdoor & Garden" class="w-full h-64 object-cover blur-xs">
        <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center p-6">
          <h3 class="text-4xl font-poppins font-bold text-white text-center drop-shadow-lg">Outdoor & Garden</h3>
        </div>
      </div>
  
      <!-- Home Improvement Card -->
      <div class="group relative overflow-hidden rounded-xl bg-gray-100 shadow-lg">
        <img src="{{ asset('images/Chomeimprovement.jpg') }}" alt="Home Improvement" class="w-full h-64 object-cover blur-xs">
        <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center p-6">
          <h3 class="text-4xl font-poppins font-bold text-white text-center drop-shadow-lg">Home Improvement</h3>
        </div>
      </div>
  
      <!-- Stationary Card -->
      <div class="group relative overflow-hidden rounded-xl bg-gray-100 shadow-lg">
        <img src="{{ asset('images/Cstationary.jpg') }}"  alt="Stationary" class="w-full h-64 object-cover blur-xs">
        <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center p-6">
          <h3 class="text-4xl font-poppins font-bold text-white text-center drop-shadow-lg">Stationary</h3>
        </div>
      </div>
  
    </div>
</section>


<section class="bg-yellow-500 text-black py-12 px-6">
  <div class="max-w-5xl mx-auto">
      <h2 class="text-7xl font-bold mb-4 text-left">
          Plan Your Expenses with Ease!
      </h2>
      <p class="text-xl text-gray-800 mb-8 text-left">  
          Introducing our new <span style="color: white; font-weight: bold;">Budget Management Tool</span>, designed to help you manage your finances effortlessly.   
          Track your spending, set savings goals, and plan smarter. Stay tuned for a smarter way to save and spend!  
      </p>  
      <div class="text-left">
        @if(Auth::check())
            <a href="{{ url('/budget') }}">
                <button class="bg-black text-white px-6 py-3 rounded-md">
                    Plan Your Budget Now
                </button>
            </a>
        @else
            <button 
                onclick="alert('Please log in to plan your budget.'); window.location.href='{{ url('login') }}';" 
                class="bg-black text-white px-6 py-3 rounded-md">
                Plan Your Budget Now
            </button>
        @endif
    </div>
  </div>
</section>





 <!-- Reviews and Ratings Section -->
<section class="my-12 px-4">
    <h2 class="text-3xl font-bold text-yellow-500 text-center mb-8">Customer<span class="text-white"> Reviews & Ratings</span></h2>
  
    <div class="flex flex-wrap justify-center gap-8">
      
      <!-- Review Card 1 (Customer) -->
      <div class="max-w-xs bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
          <div class="flex items-center mb-4">
            <img class="w-12 h-12 rounded-full border-2 border-gray-200" src="{{ asset('images/profile1.jpg') }}" alt="Customer 1">
            <div class="ml-4">
              <h3 class="text-xl font-semibold text-gray-800">John Doe</h3>
              <p class="text-gray-600 text-sm">Verified Buyer</p>
            </div>
          </div>
          
          <div class="flex items-center mb-4">
            <span class="text-yellow-500 text-lg font-bold">★★★★★</span>
            <p class="text-gray-500 text-sm ml-2">5.0/5.0</p>
          </div>
          
          <p class="text-gray-700 text-base mb-4">
            "Fantastic product! The quality is unmatched, and the price is very reasonable. I'm definitely recommending this to all my friends!"
          </p>
          
          <div class="flex items-center text-gray-500 text-sm">
            <svg class="w-4 h-4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M8 6.46l-3.72-3.72a1 1 0 0 0-1.42 1.42l3 3.01-4.56 4.55a1 1 0 0 0 1.42 1.42l5-5a1 1 0 0 0 0-1.42z"></path></svg>
            <p>Helpful (35)</p>
          </div>
        </div>
      </div>
  
      <!-- Review Card 2 (Customer) -->
      <div class="max-w-xs bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
          <div class="flex items-center mb-4">
            <img class="w-12 h-12 rounded-full border-2 border-gray-200" src="{{ asset('images/profile2.jpg') }}" alt="Customer 2">
            <div class="ml-4">
              <h3 class="text-xl font-semibold text-gray-800">Jane Smith</h3>
              <p class="text-gray-600 text-sm">Verified Buyer</p>
            </div>
          </div>
          
          <div class="flex items-center mb-4">
            <span class="text-yellow-500 text-lg font-bold">★★★★★</span>
            <p class="text-gray-500 text-sm ml-2">5.0/5.0</p>
          </div>
          
          <p class="text-gray-700 text-base mb-4">
            "This product exceeded my expectations. High quality and exactly as described. Will definitely buy again from this seller!"
          </p>
          
          <div class="flex items-center text-gray-500 text-sm">
            <svg class="w-4 h-4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M8 6.46l-3.72-3.72a1 1 0 0 0-1.42 1.42l3 3.01-4.56 4.55a1 1 0 0 0 1.42 1.42l5-5a1 1 0 0 0 0-1.42z"></path></svg>
            <p>Helpful (22)</p>
          </div>
        </div>
      </div>

      <div class="max-w-xs bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
          <div class="flex items-center mb-4">
            <img class="w-12 h-12 rounded-full border-2 border-gray-200" src="{{ asset('images/seller2.jpg') }}" alt="Seller 2">
            <div class="ml-4">
              <h3 class="text-xl font-semibold text-gray-800">Jackson Hugh</h3>
              <p class="text-gray-600 text-sm">Verified Seller</p>
            </div>
          </div>
          
          <div class="flex items-center mb-4">
            <span class="text-yellow-500 text-lg font-bold">★★★★★</span>
            <p class="text-gray-500 text-sm ml-2">4.5/5.0</p>
          </div>
          
          <p class="text-gray-700 text-base mb-4">
            "Had a great selling experience! Met Some Friendly buyers through this. Would definitely sell some items again!"
          </p>
          
          <div class="flex items-center text-gray-500 text-sm">
            <svg class="w-4 h-4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M8 6.46l-3.72-3.72a1 1 0 0 0-1.42 1.42l3 3.01-4.56 4.55a1 1 0 0 0 1.42 1.42l5-5a1 1 0 0 0 0-1.42z"></path></svg>
            <p>Helpful (10)</p>
          </div>
        </div>
      </div>
  
      <!-- Review Card 3 (Customer) -->
      <div class="max-w-xs bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
          <div class="flex items-center mb-4">
            <img class="w-12 h-12 rounded-full border-2 border-gray-200" src="{{ asset('images/profile3.jpg') }}" alt="Customer 3">
            <div class="ml-4">
              <h3 class="text-xl font-semibold text-gray-800">Mark Johnson</h3>
              <p class="text-gray-600 text-sm">Verified Buyer</p>
            </div>
          </div>
          
          <div class="flex items-center mb-4">
            <span class="text-yellow-500 text-lg font-bold">★★★★★</span>
            <p class="text-gray-500 text-sm ml-2">5.0/5.0</p>
          </div>
          
          <p class="text-gray-700 text-base mb-4">
            "A great experience. Product quality is exceptional, and the seller was responsive and helpful. Will definitely return for more!"
          </p>
          
          <div class="flex items-center text-gray-500 text-sm">
            <svg class="w-4 h-4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M8 6.46l-3.72-3.72a1 1 0 0 0-1.42 1.42l3 3.01-4.56 4.55a1 1 0 0 0 1.42 1.42l5-5a1 1 0 0 0 0-1.42z"></path></svg>
            <p>Helpful (17)</p>
          </div>
        </div>
      </div>
  
    </div>
  
</section>

  <!-- Include Footer -->
  @include('layouts.footer')
  
</body>
</html>