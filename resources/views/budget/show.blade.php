<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Budget</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-black text-white font-sans">

    <div class="min-h-screen flex flex-col items-center p-10">

        <!-- Main Container -->
        <div class="w-full max-w-4xl bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl shadow-2xl p-10">

            <!-- Title Section -->
            <h1 class="text-4xl font-bold text-center text-yellow-400 mb-8">Your Budget Overview</h1>

            <!-- Budget Overview Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <!-- Budget Summary -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg border-t-4 border-yellow-500">
                    <h2 class="text-2xl font-semibold text-white mb-6">Budget Summary</h2>
                    <ul class="space-y-4 text-lg">
                        @foreach($categories as $category => $amount)
                        <li class="flex justify-between items-center">
                            <span class="text-gray-300">{{ $category }}</span>
                            <span class="font-semibold text-yellow-400">Rs. {{ number_format($amount, 2) }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Budget Breakdown (Chart) -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg border-t-4 border-yellow-500">
                    <h2 class="text-2xl font-semibold text-white mb-6">Budget Breakdown</h2>
                    <canvas id="budgetChart" class="w-full h-72"></canvas>
                </div>

            </div>

            <!-- Recommendations Section -->
            <div class="mt-12">
                <h2 class="text-3xl font-semibold text-center text-yellow-400 mb-8">Budget Recommendations</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($recommendations as $item)
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg border-t-4 border-yellow-500">
                        <img src="{{ asset('storage/' . $item->images[0]) }}" alt="{{ $item->title }}" class="w-full h-40 object-cover rounded-lg mb-6">
                        <h3 class="font-semibold text-xl text-white">{{ $item->title }}</h3>
                        <p class="text-sm text-gray-300">{{ $item->category->name }}</p>
                        <p class="font-semibold text-yellow-400 mt-4">Rs. {{ number_format($item->price) }}</p>
                        <a href="{{ route('all.ads', $item->id) }}" class="text-sm text-yellow-500 mt-4 block">View Details</a>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Cancel Plan Button -->
            @if(session('budgetPlanCreated'))
            <div class="flex justify-end mt-8">
                <a href="{{ route('budget.cancel') }}" class="bg-yellow-500 text-black py-3 px-6 rounded-full shadow-md hover:shadow-lg transition-all duration-300">
                    Cancel Plan
                </a>
            </div>
            @endif

            <!-- Home Button -->
            <div class="flex justify-center mt-8">
                <a href="{{ route('home') }}" class="bg-yellow-500 text-black py-3 px-8 rounded-full shadow-md hover:shadow-lg transition-all duration-300">
                    Go to Home
                </a>
            </div>

        </div>

    </div>

    <!-- Chart.js Script -->
    <script>
        const ctx = document.getElementById('budgetChart').getContext('2d');
        const chartData = @json(array_values($categories));
        const chartLabels = @json(array_keys($categories));
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: chartLabels,
                datasets: [{
                    data: chartData,
                    backgroundColor: ['#fbbf24', '#facc15', '#f87171', '#34d399', '#60a5fa'],
                    borderWidth: 1,
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 14,
                            }
                        }
                    },
                },
            },
        });
    </script>

</body>

</html>
