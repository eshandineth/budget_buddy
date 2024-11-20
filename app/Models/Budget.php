<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'income', 'fixed_expenses', 'discretionary_expenses', 'savings_goal', 'preferences'];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
