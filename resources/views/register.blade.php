<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Budget Buddy</title>
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
            background-color: rgba(255, 255, 255, 0.5); /* Adjust opacity for the blur effect */
        }
    </style>
</head>
<body class="bg-image flex items-center justify-center min-h-screen">

    <!-- Registration Form Container -->
    <div class="bg-black rounded-lg shadow-lg p-6 w-4/5 max-w-4xl bg-blur">

        <!-- Close Button -->
        <button id="close-btn" class="absolute top-1 right-2 text-gray-800 text-3xl " onclick="window.location.href='/'">&times;</button>

        <!-- Form Content -->
        <div class="flex">
            <!-- Left side (Registration form) -->
            <div class="w-full md:w-1/2 p-6 rounded-lg shadow-lg bg-black">

                <!-- Logo with bounce animation -->
                <div class="mb-4 flex items-center justify-start">
                    <img src="images/buddylogo.jpg" alt="Budget Buddy Logo" class="h-10">
                </div>

                <h2 class="text-2xl font-semibold text-center text-white">Create an Account</h2>
                <p class="text-white text-center mb-6">Please fill in the details to register.</p>

                <!-- Registration Form -->
                <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
                    @csrf
                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-white text-sm font-semibold mb-1">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Enter your name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('name') border-red-500 @enderror">
                        @error('name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-white text-sm font-semibold mb-1">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('email') border-red-500 @enderror">
                        @error('email')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-white text-sm font-semibold mb-1">Password</label>
                        <input type="password" id="password" name="password" required placeholder="Enter your password" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('password') border-red-500 @enderror">
                        @error('password')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password Input -->
                    <div>
                        <label for="password_confirmation" class="block text-white text-sm font-semibold mb-1">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Confirm your password" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- Register Button -->
                    <button type="submit" class="w-full bg-yellow-500 font-semibold text-black p-2 rounded-lg hover:bg-yellow-600 transition transform hover:scale-105 duration-300 shadow-lg">Register</button>
                </form>

                <!-- Log in link -->
                <p class="text-center  text-white mt-6">Already have an account? <a href="{{ route('login.show') }}" class="text-yellow-500 font-semibold">Log in</a></p>
            </div>

            <!-- Right side (Image) -->
            <div class="hidden md:block w-1/2 p-4">
                <img src="{{ asset('images/login.jpg') }}" alt="Login Image" class="w-full h-full object-cover rounded-lg shadow-md transform scale-105">
            </div>
        </div>
    </div>

</body>
</html>