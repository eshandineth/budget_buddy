<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['listing_id', 'file_path', 'type'];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
