<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    public function index()
    {
        $expenses = Expense::all();
        $total_exp = Expense::select('amount')->sum('amount');
        $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();
        $monthly_exp = Expense::whereBetween('created_at', [$startDate, $endDate])->select('amount')->sum('amount');

        $startDate = Carbon::now()->startOfWeek();
        $endDate = Carbon::now()->endOfWeek();

        $weekly_exp = Expense::whereBetween('created_at', [$startDate, $endDate])->select('amount')->sum('amount');
        return view('admin.expenses.list', compact('expenses', 'total_exp', 'monthly_exp', 'weekly_exp'));
    }


    public function create()
    {
        return view('admin.expenses.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required',
            'amount' => 'required',
            'description' => 'nullable'
        ]);
        $expenses = new Expense();
        $expenses->label = $request->label;
        $expenses->amount = $request->amount;
        $expenses->description = $request->description;
        $expenses->save();
        return redirect()->back()->with('success', 'Expenses Created Successfully');
    }


    public function show(Expense $expense)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, Expense $expense)
    {
        //
    }


    public function destroy(Expense $expense)
    {
        //
    }
}
