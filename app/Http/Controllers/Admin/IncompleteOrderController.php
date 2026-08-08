<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IncompleteOrder;
use Illuminate\Http\Request;

class IncompleteOrderController extends Controller
{
    public function index()
    {
        // Auto-delete orders older than 7 days when the admin visits this page
        IncompleteOrder::where('created_at', '<', now()->subDays(7))->delete();

        $orders = IncompleteOrder::with('landingPage')->latest()->paginate(15);
        return view('admin.incomplete_orders.index', compact('orders'));
    }

    public function destroy(IncompleteOrder $incompleteOrder)
    {
        $incompleteOrder->delete();
        return redirect()->route('admin.incomplete-orders.index')->with('success', 'Incomplete order deleted successfully.');
    }
}
