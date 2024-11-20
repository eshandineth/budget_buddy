<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Listing;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function create()
    {
        $hasPlan = session()->has('budgetPlanCreated');
        return view('budget.create', compact('hasPlan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'income' => 'required|numeric',
            'fixed_expenses' => 'required|numeric',
            'discretionary_expenses' => 'required|numeric',
            'savings_goal' => 'required|numeric',
        ]);

        // Create the budget for the user
        Budget::create([
            'user_id' => auth()->id(),
            'income' => $request->income,
            'fixed_expenses' => $request->fixed_expenses,
            'discretionary_expenses' => $request->discretionary_expenses,
            'savings_goal' => $request->savings_goal,
            'preferences' => $request->preferences,
        ]);

        // Set the session flag to indicate that the budget has been created
        session(['budgetPlanCreated' => true]);

        return redirect()->route('budget.show')->with('success', 'Budget created successfully!');
    }

    public function show()
    {
        $budget = Budget::where('user_id', auth()->id())->latest()->first();
        if (!$budget) {
            return redirect()->route('budget.create')->with('error', 'Create a budget first.');
        }

        $categories = [
            'Fixed Expenses' => $budget->fixed_expenses,
            'Discretionary Spending' => $budget->discretionary_expenses,
            'Savings' => $budget->savings_goal,
            'Leftover' => $budget->income - ($budget->fixed_expenses + $budget->discretionary_expenses + $budget->savings_goal),
        ];

        $recommendations = Listing::where('price', '<=', $budget->discretionary_expenses)->take(5)->get();

        return view('budget.show', compact('budget', 'categories', 'recommendations'));
    }

    public function cancelPlan()
    {
        // Get the current user's latest budget
        $budget = Budget::where('user_id', auth()->id())->latest()->first();

        // If a budget exists, delete it
        if ($budget) {
            $budget->delete();
        }

        // Clear the session data that indicates a budget plan is created
        session()->forget('budgetPlanCreated');

        // Redirect to the budget creation page so the user can start fresh
        return redirect()->route('budget.create');
    }
}
