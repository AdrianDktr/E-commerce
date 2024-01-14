<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Http\Request;

class CashFlowsController extends Controller
{
    public function index_line_chart(){

        $cashFlows = Transaction::selectRaw('MONTH(transactions.created_at) as month, SUM(transactions.amount) as total_amount')
            ->join('orders', 'transactions.order_id', '=', 'orders.id')
            ->where('orders.is_paid', true)
            ->groupBy('month')
            ->get();


        $labels = $cashFlows->pluck('month');
        $data = $cashFlows->pluck('total_amount');


        return view('finance-report.cash_flows', compact('labels', 'data'));
    }
}
