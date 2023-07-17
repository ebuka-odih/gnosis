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

        $month_startDate = Carbon::now()->subMonth();
        $month_endDate = Carbon::now();
        $monthly_exp = Expense::whereBetween('created_at', [$month_startDate, $month_endDate])->select('amount')->sum('amount');

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
        return redirect()->back()->with('created', 'Expenses Created Successfully');
    }


    public function show(Expense $expense)
    {
        //
    }


    public function edit($id)
    {
        $expenses = Expense::findOrFail($id);
        return view('admin.expenses.edit', compact('expenses'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'label' => 'nullable',
            'amount' => 'nullable',
            'description' => 'nullable'
        ]);
        $expense = Expense::findOrFail($id);
        $expense->update($data);
        return redirect()->route('admin.expenses.index')->with('updated', "Expenses Deleted Successfully");

    }


    public function destroy($id)
    {
        $expenses = Expense::findOrFail($id);
        $expenses->delete();
        return redirect()->back()->with('deleted', "Expenses Deleted Successfully");
    }
}
