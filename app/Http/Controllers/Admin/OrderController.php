<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['landingPage', 'customer']);
        
        // Filter by Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        // Filter by Date Range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }
        
        // Search by Customer Name or Phone
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('customer', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }
        
        $orders = $query->latest()->paginate(15)->withQueryString();
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:Pending,Confirm,Deliver,Success,Cancel'
        ]);
        
        $order->update(['status' => $request->status]);
        
        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }
}
