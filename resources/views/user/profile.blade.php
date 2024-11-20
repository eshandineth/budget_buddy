<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Budget Buddy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class=" min-h-screen bg-black text-white">

    <!-- Header -->
    @include('layouts.header')

    <!-- Hero Section -->
    <div class="border-t border-gray-700 bg-gradient-to-br from-black via-black to-yellow-500 py-16">
        <div class="container mx-auto px-6 lg:px-16 text-center">
            <div class="bg-white text-black rounded-lg shadow-lg p-8 max-w-3xl mx-auto">
                <div class="flex flex-col items-center">
                    <!-- Profile Picture -->
                    <img 
                        src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : 'https://via.placeholder.com/150' }}" 
                        alt="Profile Picture" 
                        class="w-32 h-32 rounded-full border-4 border-yellow-500 shadow-md mb-6">
                    
                    <!-- User Info -->
                    <h1 class="text-3xl font-extrabold">{{ Auth::user()->name }}</h1>
                    <p class="text-lg text-gray-700 mt-2">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 lg:px-16 py-12">
        <h2 class="text-2xl font-bold text-yellow-500 mb-6 text-center">Dashboard Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Profile Management Card -->
            <div class="bg-white text-black rounded-lg shadow-lg p-6 hover:shadow-xl transition-transform transform hover:-translate-y-1">
                <h3 class="text-xl font-semibold mb-4">Profile Management</h3>
                <p class="text-gray-700 mb-4">Update your personal details and manage your account settings.</p>
                <a href="{{ route('manageProfile') }}" 
                   class="block text-center bg-yellow-500 text-black py-2 rounded-lg hover:bg-yellow-600 transition font-semibold">Manage Profile</a>
            </div>

            <!-- Listing Management Card -->
            <div class="bg-white text-black rounded-lg shadow-lg p-6 hover:shadow-xl transition-transform transform hover:-translate-y-1">
                <h3 class="text-xl font-semibold mb-4">Listing Management</h3>
                <p class="text-gray-700 mb-4">View, update, or create new listings effortlessly.</p>
                <a href="{{ route('listings.index') }}" 
                   class="block text-center bg-yellow-500 text-black py-2 rounded-lg hover:bg-yellow-600 transition font-semibold">Manage Listings</a>
            </div>

            <!-- Account Actions Card -->
            <div class="bg-white text-black rounded-lg shadow-lg p-6 hover:shadow-xl transition-transform transform hover:-translate-y-1">
                <h3 class="text-xl font-semibold mb-4">Account Actions</h3>
                <p class="text-gray-700 mb-4">Logout or delete your account securely.</p>
                <form action="{{ route('logout') }}" method="POST" class="mb-2">
                    @csrf
                    <button type="submit" 
                            class="w-full bg-yellow-500 text-black py-2 rounded-lg hover:bg-yellow-600 transition font-semibold">Logout</button>
                </form>
                <form action="{{ route('delete-account') }}" method="POST">
                    @csrf
                    <button type="submit" 
                            class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition font-semibold">Delete Account</button>
                </form>
            </div>

        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer')

</body>
</html>
