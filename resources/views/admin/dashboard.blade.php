<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Budget Buddy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Wrapper -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white flex flex-col justify-between">
            <!-- Sidebar Header -->
            <div class="p-4">
                <h2 class="text-2xl font-bold">Admin Dashboard</h2>
            </div>
            <!-- Sidebar Links -->
            <nav class="flex-grow">
                <ul class="space-y-2 p-4">
                    <li><a href="#" class="block py-2 px-4 bg-gray-900 rounded-lg hover:bg-gray-700">Dashboard</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-700">Users</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-700">Orders</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-700">Products</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-700">Categories</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-700">Reports</a></li>
                </ul>
            </nav>
            <!-- Sidebar Footer -->
            <div class="p-4">
                <a href="#" class="block py-2 px-4 bg-red-600 rounded-lg text-center hover:bg-red-700">Logout</a>
            </div>
        </aside>
        
        <!-- Main Content -->
        <div class="flex-1">
            <!-- Header -->
            <header class="bg-white shadow-lg p-4 flex justify-between items-center">
                <h1 class="text-2xl font-semibold text-gray-800">Welcome, Admin!</h1>
                <div>
                    <button class="text-gray-600 hover:text-gray-800">
                        <i class="fas fa-user-circle text-3xl"></i>
                    </button>
                </div>
            </header>
            
            <!-- Main Dashboard Content -->
            <main class="p-6">
                <!-- Overview Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white shadow-lg rounded-lg p-4 flex items-center">
                        <div class="text-blue-500 text-4xl"><i class="fas fa-users"></i></div>
                        <div class="ml-4">
                            <p class="text-xl font-semibold">150</p>
                            <p class="text-gray-500">Total Users</p>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-4 flex items-center">
                        <div class="text-green-500 text-4xl"><i class="fas fa-shopping-cart"></i></div>
                        <div class="ml-4">
                            <p class="text-xl font-semibold">87</p>
                            <p class="text-gray-500">New Orders</p>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-4 flex items-center">
                        <div class="text-yellow-500 text-4xl"><i class="fas fa-box"></i></div>
                        <div class="ml-4">
                            <p class="text-xl font-semibold">120</p>
                            <p class="text-gray-500">Products</p>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-4 flex items-center">
                        <div class="text-red-500 text-4xl"><i class="fas fa-chart-line"></i></div>
                        <div class="ml-4">
                            <p class="text-xl font-semibold">$12,450</p>
                            <p class="text-gray-500">Revenue</p>
                        </div>
                    </div>
                </div>
                
                <!-- Table Section -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-6 py-4 border-b">
                        <h2 class="font-semibold text-gray-800">Recent Orders</h2>
                    </div>
                    <div class="p-6 overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr>
                                    <th class="py-3 px-4 bg-gray-200 font-medium text-gray-600 border-b">Order ID</th>
                                    <th class="py-3 px-4 bg-gray-200 font-medium text-gray-600 border-b">Customer</th>
                                    <th class="py-3 px-4 bg-gray-200 font-medium text-gray-600 border-b">Amount</th>
                                    <th class="py-3 px-4 bg-gray-200 font-medium text-gray-600 border-b">Status</th>
                                    <th class="py-3 px-4 bg-gray-200 font-medium text-gray-600 border-b">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-3 px-4 border-b">#001</td>
                                    <td class="py-3 px-4 border-b">John Doe</td>
                                    <td class="py-3 px-4 border-b">$123.45</td>
                                    <td class="py-3 px-4 border-b text-green-600">Completed</td>
                                    <td class="py-3 px-4 border-b">Nov 8, 2024</td>
                                </tr>
                                <!-- Repeat more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
