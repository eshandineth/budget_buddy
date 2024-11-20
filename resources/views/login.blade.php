<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Budget Buddy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> 
    <script src="{{ asset('js/script.js') }}" defer></script> 
    <style>
        .bg-image {
            background-color: rgb(0, 0, 0);
            background-size: cover;
            background-position: center;
        }
        .bg-blur {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body class="bg-image flex items-center justify-center min-h-screen">

    <div class="bg-black rounded-lg shadow-lg p-6 w-4/5 max-w-4xl bg-blur">
        
        <!-- Close Button -->
        <button id="close-btn" class="absolute top-1 right-2 text-gray-800 text-3xl" onclick="window.location.href='{{ url('/') }}'">&times;</button>

        <!-- Form Content -->
        <div class="flex">
            <!-- Left side (Login form) -->
            <div class="w-full md:w-1/2 p-6 rounded-lg shadow-lg bg-black">
                
                <div class="mb-4 flex items-center justify-start">
                    <img src="{{ asset('images/buddylogo.jpg') }}" alt="Budget Buddy Logo" class="h-10">
                </div>

                <h2 class="text-2xl font-semibold text-center text-white">Welcome Back!</h2>
                <p class="text-white text-center mb-6">Please log in to your account.</p>

                <!-- Laravel Form Submission -->
                <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                    @csrf
                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-white text-sm font-semibold mb-1">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        @error('email')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-white text-sm font-semibold mb-1">Password</label>
                        <input type="password" id="password" name="password" required placeholder="Enter your password" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        @error('password')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me and Forgot Password -->
                    <div class="flex justify-between items-center">
                        <div>
                            <input type="checkbox" id="remember" name="remember" class="mr-2">
                            <label for="remember" class="text-white text-sm">Remember Me</label>
                        </div>
                        <a href="#" class="text-yellow-500 text-sm">Forgot Password?</a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="w-full bg-yellow-500 font-semibold text-black p-2 rounded-lg hover:bg-yellow-600 transition transform hover:scale-105 duration-300 shadow-lg">Log In</button>
                </form>

                <p class="text-center text-white mt-6">Don't have an account? <a href="{{ route('register.show') }}" class="text-yellow-500 font-semibold">Sign up for free</a></p>

            </div>

            <!-- Right side (Image) -->
            <div class="hidden md:block w-1/2 p-4">
                <img src="{{ asset('images/login.jpg') }}" alt="Login Image" class="w-full h-full object-cover rounded-lg shadow-md transform scale-105">
            </div>
        </div>
    </div>

</body>
</html>