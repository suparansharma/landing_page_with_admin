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
        
        // Search by Order ID, Customer Name or Phone
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhereHas('customer', function($cq) use ($search) {
                      $cq->where('name', 'like', "%{$search}%")
                         ->orWhere('phone', 'like', "%{$search}%");
                  });
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
        $order->load(['customer', 'landingPage']);
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $order->load('customer');
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string',
            'product_option' => 'nullable|string|max:255',
            'product_cost' => 'required|numeric',
            'shipping_cost' => 'required|numeric',
            'status' => 'required|in:Pending,Confirm,Deliver,Success,Cancel'
        ]);

        $order->customer->update([
            'name' => $request->customer_name,
            'phone' => $request->customer_phone,
            'address' => $request->customer_address,
        ]);

        $order->update([
            'product_option' => $request->product_option,
            'product_cost' => $request->product_cost,
            'shipping_cost' => $request->shipping_cost,
            'total_amount' => $request->product_cost + $request->shipping_cost,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
}
