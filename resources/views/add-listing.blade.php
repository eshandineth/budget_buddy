<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Add Listing Form</title>
</head>

<body class=" bg-black text-white min-h-screen flex flex-col">

    @include('layouts.header')
    <div class=" border-t border-gray-700 flex justify-center items-center py-10">
        
        <div class="bg-black shadow-2xl rounded-xl w-full max-w-4xl px-8 py-10 relative">

            <!-- Form Header -->
            <h2 class="text-3xl font-bold text-yellow-500 text-center mb-8">
                Add a New Listing
            </h2>

            <!-- Add Border Around Form -->
            <div class="border-4 border-yellow-500 rounded-lg p-6">
                <!-- Form -->
                <form id="listingForm" action="{{ route('listings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
            {{ session('error') }}
        </div>
    @endif

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-lg font-semibold text-gray-300 mb-2">Product Title</label>
                        <input type="text" name="title" id="title" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required placeholder="Enter product title">
                    </div>

                    <!-- Category and Subcategory -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="category" class="block text-lg font-semibold text-gray-300 mb-2">Category</label>
                            <select name="category_id" id="category" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="subcategory" class="block text-lg font-semibold text-gray-300 mb-2">Subcategory</label>
                            <select name="subcategory_id" id="subcategory" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required>
                                <option value="">Select Subcategory</option>
                            </select>
                        </div>
                    </div>

                    <!-- Condition -->
                    <div>
                        <label for="condition" class="block text-lg font-semibold text-gray-300 mb-2">Condition</label>
                        <select name="condition" id="condition" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required>
                            <option value="">Select Condition</option>
                            <option value="A-Grade">A-Grade</option>
                            <option value="B-Grade">B-Grade</option>
                            <option value="C-Grade">C-Grade</option>
                            <option value="D-Grade">D-Grade</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-lg font-semibold text-gray-300 mb-2">Description & Reason For Selling</label>
                        <textarea name="description" id="description" rows="3" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required placeholder="Enter product description"></textarea>
                    </div>

                    <!-- Product History -->
                    <div>
                        <label for="product_history" class="block text-lg font-semibold text-gray-300 mb-2">Product History</label>
                        <textarea name="product_history" id="product_history" rows="2" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" placeholder="Enter product history (if any)"></textarea>
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-lg font-semibold text-gray-300 mb-2">Price</label>
                        <input type="number" name="price" id="price" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required placeholder="Enter price">
                    </div>

                    <!-- Contact Information -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="contact_number" class="block text-lg font-semibold text-gray-300 mb-2">Contact Number</label>
                            <input type="text" name="contact_number" id="contact_number" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required placeholder="Enter contact number">
                        </div>
                        <div>
                            <label for="district" class="block text-lg font-semibold text-gray-300 mb-2">District</label>
                            <input type="text" name="district" id="district" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required placeholder="Enter district">
                        </div>
                        <div>
                            <label for="city" class="block text-lg font-semibold text-gray-300 mb-2">City</label>
                            <input type="text" name="city" id="city" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required placeholder="Enter city">
                        </div>
                    </div>

                    <!-- Images -->
                    <div>
                        <label for="images" class="block text-lg font-semibold text-gray-300 mb-2">Images</label>
                        <input type="file" name="images[]" id="images" multiple class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" accept="image/*">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-yellow-500 text-black font-bold py-3 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-500 focus:ring-opacity-50 transition-transform transform hover:scale-105">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const categories = @json($categories);

        document.getElementById("category").addEventListener("change", function () {
            const categoryId = this.value;
            const subcategorySelect = document.getElementById("subcategory");

            subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';
            const category = categories.find(cat => cat.id == categoryId);
            if (category && category.subcategories) {
                category.subcategories.forEach(sub => {
                    const option = document.createElement("option");
                    option.value = sub.id;
                    option.textContent = sub.name;
                    subcategorySelect.appendChild(option);
                });
            }
        });

        document.getElementById("closeModal").addEventListener("click", function () {
            window.location.href = "/";
        });
    </script>

    @include('layouts.footer')
</body>

</html>
