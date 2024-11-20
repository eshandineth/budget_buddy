<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'title', 'category_id', 'subcategory_id', 'condition',
        'description', 'product_history', 'price', 'images',
        'contact_number', 'district', 'city', 'user_id' // Added new fields
    ];

    // Cast the 'images' field as an array
    protected $casts = [
        'images' => 'array',
    ];

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define the relationship with the Subcategory model
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
}
