<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Models\SubCategory;


class ListingController extends Controller
{
    // Show the create listing form
    public function create()
    {
        $categories = Category::with('subcategories')->get();
        return view('add-listing', compact('categories'));
    }

    // Store a new listing
    public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'subcategory_id' => 'required|exists:subcategories,id',
        'condition' => 'required|in:A-Grade,B-Grade,C-Grade,D-Grade',
        'description' => 'required|string',
        'product_history' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'contact_number' => 'required|string|max:15',
        'district' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'images.*' => 'nullable|image|max:2048',
    ]);

    // Add the user_id of the logged-in user
    $data['user_id'] = Auth::id();

    // Check for duplicate listings
    $duplicate = Listing::where('title', $data['title'])
        ->where('category_id', $data['category_id'])
        ->where('subcategory_id', $data['subcategory_id'])
        ->where('price', $data['price'])
        ->where('description', $data['description'])
        ->where('user_id', $data['user_id'])
        ->first();

    if ($duplicate) {
        // Notify the user about the duplicate listing
        return redirect()->back()->with('error', 'A listing with similar details already exists.');
    }

    // Handle image uploads
    if ($request->hasFile('images')) {
        $data['images'] = array_map(function ($image) {
            return $image->store('images', 'public');
        }, $request->file('images'));
    }

    // Create the listing
    Listing::create($data);

    return redirect()->route('listings.create')->with('success', 'Listing added successfully!');
}
    

    
public function index()
    {
        // Check if user is logged in
        if (Auth::check()) {
            // Fetch listings for the authenticated user
            $listings = Listing::where('user_id', Auth::id())->get();
            return view('listings.index', compact('listings'));
        } else {
            // Redirect to login page if user is not authenticated
            return redirect()->route('login');
        }
    }

    // Show a single listing
    public function show(Listing $listing)
{
    $listing->load('user'); // Eager load the user relationship
    return view('listings.show', compact('listing'));
}

    // Edit a listing
    public function edit(Listing $listing)
{
    $categories = Category::with('subcategories')->get(); // Load categories with their subcategories
    $subcategories = Subcategory::where('category_id', $listing->category_id)->get(); // Fetch relevant subcategories

    return view('listings.edit', compact('listing', 'categories', 'subcategories'));
}

    // Update a listing
    public function update(Request $request, Listing $listing)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'subcategory_id' => 'required|exists:subcategories,id',
        'condition' => 'required|in:A-Grade,B-Grade,C-Grade,D-Grade',
        'description' => 'required|string',
        'product_history' => 'nullable|string',
        'price' => 'required|numeric',
        'contact_number' => 'required|string|max:15',
        'district' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'images.*' => 'nullable|image|max:2048',
    ]);

    // Handle image uploads
    if ($request->hasFile('images')) {
        // Store new images and replace old ones
        $data['images'] = array_map(function ($image) {
            return $image->store('images', 'public');
        }, $request->file('images'));
    } else {
        // If no image is uploaded, keep the current ones
        $data['images'] = $listing->images;
    }

    // Update the listing with the validated data
    $listing->update($data);

    return redirect()->route('listings.index')->with('success', 'Listing updated successfully!');
}

    // Delete a listing
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->route('listings.index')->with('success', 'Listing deleted successfully!');
    }
}
