<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-black text-white min-h-screen flex flex-col">

    <!-- Header -->
    @include('layouts.header')

    <div class="border-t border-gray-700 flex justify-center items-center py-10">
        <div class="bg-gray-800 shadow-2xl rounded-xl w-full max-w-4xl px-8 py-10 relative">

            <!-- Form Header -->
            <h2 class="text-3xl font-bold text-yellow-500 text-center mb-8">
                Edit Listing: {{ $listing->title }}
            </h2>

            <!-- Form Border -->
            <div class="border-4 border-yellow-500 rounded-lg p-6">
                <!-- Form -->
                <form action="{{ route('listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-lg font-semibold text-gray-300 mb-2">Product Title</label>
                        <input type="text" name="title" id="title" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" value="{{ old('title', $listing->title) }}" required>
                    </div>

                    <!-- Category and Subcategory (Edit Existing Listing) -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="category" class="block text-lg font-semibold text-gray-300 mb-2">Category</label>
        <select name="category_id" id="category" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $listing->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="subcategory" class="block text-lg font-semibold text-gray-300 mb-2">Subcategory</label>
        <select name="subcategory_id" id="subcategory" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required>
            @foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}" {{ $subcategory->id == $listing->subcategory_id ? 'selected' : '' }}>
                    {{ $subcategory->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

                    <!-- Condition -->
                    <div>
                        <label for="condition" class="block text-lg font-semibold text-gray-300 mb-2">Condition</label>
                        <select name="condition" id="condition" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required>
                            <option value="A-Grade" {{ old('condition', $listing->condition) == 'A-Grade' ? 'selected' : '' }}>A-Grade</option>
                            <option value="B-Grade" {{ old('condition', $listing->condition) == 'B-Grade' ? 'selected' : '' }}>B-Grade</option>
                            <option value="C-Grade" {{ old('condition', $listing->condition) == 'C-Grade' ? 'selected' : '' }}>C-Grade</option>
                            <option value="D-Grade" {{ old('condition', $listing->condition) == 'D-Grade' ? 'selected' : '' }}>D-Grade</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-lg font-semibold text-gray-300 mb-2">Description & Reason For Selling</label>
                        <textarea name="description" id="description" rows="3" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required>{{ old('description', $listing->description) }}</textarea>
                    </div>

                    <!-- Product History -->
                    <div>
                        <label for="product_history" class="block text-lg font-semibold text-gray-300 mb-2">Product History</label>
                        <textarea name="product_history" id="product_history" rows="2" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none">{{ old('product_history', $listing->product_history) }}</textarea>
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-lg font-semibold text-gray-300 mb-2">Price</label>
                        <input type="number" name="price" id="price" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" value="{{ old('price', $listing->price) }}" required>
                    </div>

                    <!-- Contact Information -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="contact_number" class="block text-lg font-semibold text-gray-300 mb-2">Contact Number</label>
                            <input type="text" name="contact_number" id="contact_number" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" value="{{ old('contact_number', $listing->contact_number) }}" required>
                        </div>
                        <div>
                            <label for="district" class="block text-lg font-semibold text-gray-300 mb-2">District</label>
                            <input type="text" name="district" id="district" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" value="{{ old('district', $listing->district) }}" required>
                        </div>
                        <div>
                            <label for="city" class="block text-lg font-semibold text-gray-300 mb-2">City</label>
                            <input type="text" name="city" id="city" class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" value="{{ old('city', $listing->city) }}" required>
                        </div>
                    </div>

                    <!-- Images -->
                    <div>
                        <label for="images" class="block text-lg font-semibold text-gray-300 mb-2">Images</label>
                        <input type="file" name="images[]" id="images" multiple class="w-full bg-white text-black border border-yellow-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" accept="image/*">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-yellow-500 text-black font-bold py-3 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-500 focus:ring-opacity-50 transition-transform transform hover:scale-105">
                        Update Listing
                    </button>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        const categories = @json($categories);
        const currentCategoryId = {{ $listing->category_id }}; // Get the current category ID from the existing listing
        const currentSubcategoryId = {{ $listing->subcategory_id }}; // Get the current subcategory ID
    
        // Function to populate subcategories
        function populateSubcategories(categoryId) {
            const subcategorySelect = document.getElementById("subcategory");
            subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';
            
            const category = categories.find(cat => cat.id == categoryId);
            if (category && category.subcategories) {
                category.subcategories.forEach(sub => {
                    const option = document.createElement("option");
                    option.value = sub.id;
                    option.textContent = sub.name;
                    // If this is the current subcategory, mark it as selected
                    if (sub.id == currentSubcategoryId) {
                        option.selected = true;
                    }
                    subcategorySelect.appendChild(option);
                });
            }
        }
    
        // Initialize subcategories on page load
        populateSubcategories(currentCategoryId);
    
        // Update subcategories when category is changed
        document.getElementById("category").addEventListener("change", function () {
            const categoryId = this.value;
            populateSubcategories(categoryId);
        });
    
        // Close modal action (if needed)
        document.getElementById("closeModal").addEventListener("click", function () {
            window.location.href = "/";
        });
    </script>
    

</body>

</html>
