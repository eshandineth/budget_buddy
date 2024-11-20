<?php


namespace App\Http\Controllers;

use App\Models\Listing; // Include the Listing model
use App\Models\Category; // Include the Category model
use Illuminate\Http\Request;

class AllAdsController extends Controller
{
    public function index()
    {
        // Fetch categories with their subcategories and the listings within those categories
        $categories = Category::with(['subcategories.listings'])->get();

        // Pass the categories to the view
        return view('all-ads', compact('categories'));
    }
}

