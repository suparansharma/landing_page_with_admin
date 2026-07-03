<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use App\Models\Order;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistics
        $totalLandingPages = LandingPage::count();
        $totalOrders = Order::count();
        $totalRevenue = Order::whereIn('status', ['Deliver', 'Success'])->sum('total_amount');
        $totalCustomers = Customer::count();
        
        // Order Status Counts
        $pendingOrders = Order::where('status', 'Pending')->count();
        $confirmOrders = Order::where('status', 'Confirm')->count();
        $deliverOrders = Order::where('status', 'Deliver')->count();
        $successOrders = Order::where('status', 'Success')->count();
        $cancelOrders = Order::where('status', 'Cancel')->count();
        
        // Recent Orders
        $recentOrders = Order::with(['landingPage', 'customer'])
                            ->latest()
                            ->take(5)
                            ->get();

        return view('admin.dashboard', compact(
            'totalLandingPages', 
            'totalOrders', 
            'totalRevenue', 
            'totalCustomers',
            'pendingOrders',
            'confirmOrders',
            'deliverOrders',
            'successOrders',
            'cancelOrders',
            'recentOrders'
        ));
    }
}
