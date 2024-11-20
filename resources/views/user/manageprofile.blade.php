<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom Theme Colors */
        :root {
            --yellow: #FFD700;
            --black: #000000;
            --white: #ffffff;
        }

        body {
            background-color: var(--black);
            color: var(--white);
        }

        .hover-glow:hover {
            box-shadow: 0 4px 20px var(--yellow);
        }

        .form-container {
            background-color: var(--white);
            color: var(--black);
        }

        label {
            color: var(--black);
        }

        .btn-save {
            background-color: var(--yellow);
            color: var(--black);
        }

        .btn-save:hover {
            background-color: var(--black);
            color: var(--yellow);
        }
    </style>
</head>
<body class="min-h-screen">

    <!-- Header -->
    @include('layouts.header')

    <!-- Main Content -->
    <div class="container mx-auto px-6 lg:px-16 py-12">
        
        <!-- Back Button -->
        <a href="{{ url('profile') }}" class="inline-block mb-6 text-yellow-500 hover:text-yellow-600 hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Dashboard
        </a>

        <div class="form-container shadow-lg rounded-lg p-6 lg:p-10">
            <h1 class="text-3xl font-bold mb-6 text-center">Manage Profile</h1>

            <!-- Form -->
            <form id="profileForm" action="{{ route('account.updateProfile') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Name Input -->
                <div class="relative">
                    <label for="name" class="block text-sm font-medium mb-1">Full Name</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" 
                        class="w-full border border-gray-300 rounded-md px-4 py-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-300" required>
                </div>

                <!-- Phone Number Input -->
                <div class="relative">
                    <label for="phone_number" class="block text-sm font-medium mb-1">Phone Number</label>
                    <input type="text" name="phone_number" value="{{ Auth::user()->phone_number }}" 
                        class="w-full border border-gray-300 rounded-md px-4 py-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-300">
                </div>

                <!-- District Input -->
                <div class="relative">
                    <label for="district" class="block text-sm font-medium mb-1">District</label>
                    <input type="text" name="district" value="{{ Auth::user()->district }}" 
                        class="w-full border border-gray-300 rounded-md px-4 py-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-300">
                </div>

                <!-- City Input -->
                <div class="relative">
                    <label for="city" class="block text-sm font-medium mb-1">City</label>
                    <input type="text" name="city" value="{{ Auth::user()->city }}" 
                        class="w-full border border-gray-300 rounded-md px-4 py-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-300">
                </div>

                <!-- Password Input -->
                <div class="relative">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                    <input id="password" type="password" name="password" placeholder="Leave blank if not changing" class="w-full border border-gray-300 rounded-md px-4 py-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-300">
                </div>
                
                <!-- Confirm Password Input -->
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm New Password" class="w-full border border-gray-300 rounded-md px-4 py-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-300">

                <!-- Profile Image Input -->
                <div class="relative">
                    <label for="profile_image" class="block text-sm font-medium mb-1">Profile Image</label>
                    <input type="file" name="profile_image" 
                        class="w-full text-gray-500 border border-gray-300 rounded-md px-4 py-3 file:bg-yellow-500 file:text-black file:font-medium file:mr-4 file:py-2 file:px-3 file:rounded-md file:hover:bg-yellow-600 hover:file:shadow-md focus:outline-none focus:ring-2 focus:ring-yellow-500 transition-all duration-300">
                </div>

                <!-- Save Button -->
                <button type="submit" class="btn-save w-full py-3 rounded-lg font-semibold text-lg hover:shadow-lg focus:outline-none bg-yellow-500 transition duration-300 transform hover:scale-105">
                    Save Changes
                </button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer')

</body>
</html>
