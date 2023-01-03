<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        // dd('ada');
        $costumer = User::count();
        $revenue = Transaction::where('transaction_status', 'SUCCESS')->sum('total_price');
        $transactions = Transaction::count();
        return view('pages.admin.dashboard', [
            'costumer' => $costumer,
            'revenue' => $revenue,
            'transaction' => $transactions,
        ]);
    }
}
