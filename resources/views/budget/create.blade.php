<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Budget</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white font-sans">

    <div class="min-h-screen flex items-center justify-center py-12 px-6">
        <div class="w-full max-w-lg bg-black rounded-3xl shadow-xl p-10 space-y-8 border-4 border-yellow-500">

            <!-- Header -->
            <h1 class="text-4xl font-bold text-yellow-400 text-center mb-6">
                Create Your Budget
            </h1>

            <!-- Form -->
            <form action="{{ route('budget.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="income" class="block text-lg font-medium text-gray-300">Monthly Income</label>
                    <input type="number" id="income" name="income" step="0.01" 
                        class="w-full p-4 bg-black text-white border-2 border-yellow-500 rounded-xl mt-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 placeholder-gray-400" 
                        placeholder="e.g., 50000" required>
                </div>

                <div>
                    <label for="fixed_expenses" class="block text-lg font-medium text-gray-300">Fixed Expenses</label>
                    <input type="number" id="fixed_expenses" name="fixed_expenses" step="0.01" 
                        class="w-full p-4 bg-black text-white border-2 border-yellow-500 rounded-xl mt-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 placeholder-gray-400" 
                        placeholder="e.g., 15000" required>
                </div>

                <div>
                    <label for="discretionary_expenses" class="block text-lg font-medium text-gray-300">Discretionary Spending</label>
                    <input type="number" id="discretionary_expenses" name="discretionary_expenses" step="0.01" 
                        class="w-full p-4 bg-black text-white border-2 border-yellow-500 rounded-xl mt-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 placeholder-gray-400" 
                        placeholder="e.g., 10000" required>
                </div>

                <div>
                    <label for="savings_goal" class="block text-lg font-medium text-gray-300">Savings Goal</label>
                    <input type="number" id="savings_goal" name="savings_goal" step="0.01" 
                        class="w-full p-4 bg-black text-white border-2 border-yellow-500 rounded-xl mt-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 placeholder-gray-400" 
                        placeholder="e.g., 5000" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-yellow-500 text-black py-3 px-4 rounded-full font-semibold text-xl hover:bg-yellow-600 transition-all">
                    Submit
                </button>
            </form>

            <!-- Back to Home Button -->
            <div class="mt-6 text-center">
                <a href="{{ url('/') }}" class="inline-block bg-transparent border-2 border-yellow-500 text-yellow-500 py-2 px-6 rounded-full font-semibold text-lg hover:bg-yellow-500 hover:text-black transition-all">
                    Back to Home
                </a>
            </div>

        </div>
    </div>

</body>

</html>
