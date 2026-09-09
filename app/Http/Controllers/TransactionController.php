<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // GET /api/transactions
    public function index()
    {
        return Transaction::orderBy('date')->get();
    }

    // POST /api/transactions
    public function store(Request $request)
    {
        $validated = $request->validate([
            'desc' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'amount' => 'required|integer|min:1',
            'type' => 'required|in:income,expense',
            'date' => 'required|date',
        ]);

        $transaction = Transaction::create($validated);

        return response()->json($transaction, 201);
    }

    // DELETE /api/transactions/{id}
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return response()->json(['message' => 'Deleted']);
    }
}