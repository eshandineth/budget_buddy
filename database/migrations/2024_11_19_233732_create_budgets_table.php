<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('income', 15, 2);
            $table->decimal('fixed_expenses', 15, 2);
            $table->decimal('discretionary_expenses', 15, 2);
            $table->decimal('savings_goal', 15, 2);
            $table->text('preferences')->nullable(); // JSON format
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
};
