<!-- Footer Section -->

<footer class="border-t border-gray-700 pt-8 bg-black text-white py-12">
  <div class="max-w-screen-xl mx-auto px-4">
  
    <!-- Footer Links Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">
      
      <!-- About Us Section -->
      <div>
          <h4 class="text-lg font-bold mb-4 border-b border-yellow-500 pb-2">About Us</h4>
          <p class="text-sm leading-relaxed">Budget Buddy is dedicated to providing affordable household items, making it easy to buy, sell, or trade pre-loved goods.</p>
      </div>
      <div>
          <h4 class="text-lg font-bold mb-4 border-b border-yellow-500 pb-2">Quick Links</h4>
          <ul class="space-y-2 text-sm">
              <li><a href="{{ url('/') }}" class="hover:text-yellow-400">Home</a></li>
              <li><a href="{{ url('/all-ads') }}" class="hover:text-yellow-400">All Ads</a></li>
              <li><a href="{{ url ('/add-listing')}}" class="hover:text-yellow-400">Post an Ad</a></li>
              @if(Auth::check())
    <li><a href="{{ url('profile') }}" >
      {{ Auth::user()->name }}
    </a></li>
  @else
    <li><a href="{{ url('login') }}" >
      Login
    </a></li>
  @endif
          </ul>
      </div>
      <div>
          <h4 class="text-lg font-bold mb-4 border-b border-yellow-500 pb-2">Follow Us</h4>
          <ul class="space-y-2 text-sm">
              <li><a href="#" class="flex items-center hover:text-yellow-400"><i class="fab fa-facebook-f mr-1"></i> Facebook</a></li>
              <li><a href="#" class="flex items-center hover:text-yellow-400"><i class="fab fa-twitter mr-1"></i> Twitter</a></li>
              <li><a href="#" class="flex items-center hover:text-yellow-400"><i class="fab fa-instagram mr-1"></i> Instagram</a></li>
              <li><a href="#" class="flex items-center hover:text-yellow-400"><i class="fab fa-linkedin mr-1"></i> LinkedIn</a></li>
          </ul>
      </div>
      <div>
          <h4 class="text-lg font-bold mb-4 border-b border-yellow-500 pb-2">Contact Us</h4>
          <p class="text-sm leading-relaxed">Email: <a href="mailto:support@budgetbuddy.com" class="hover:text-yellow-400">support@budgetbuddy.com</a></p>
          <p class="text-sm leading-relaxed">Phone: <span class="hover:text-yellow-400">555-123-4567</span></p>
          <p class="text-sm leading-relaxed">Address: 1, Colombo, Sri Lanka</p>
      </div>
    </div><Br>
  
    <!-- Bottom Footer -->
    <div class="border-t border-gray-700 pt-8 text-center text-gray-400">
      <p>&copy; 2024 Budget Buddy. All rights reserved.</p>
    </div>
  
  </div>
</footer>
