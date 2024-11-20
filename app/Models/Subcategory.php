<?php


// app/Models/Subcategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    // Define the relationship with Listings
    public function listings()
    {
        return $this->hasMany(Listing::class);  // Adjust if you have a different namespace for the Listing model
    }
}
