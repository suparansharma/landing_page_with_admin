<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function show($slug)
    {
        $page = LandingPage::where('slug', $slug)->firstOrFail();
        return view('landing', compact('page'));
    }

    public function storeOrder(Request $request, $slug)
    {
        $page = LandingPage::where('slug', $slug)->firstOrFail();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'shipping' => 'required|numeric'
        ]);

        // Create Customer
        $customer = Customer::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);

        $productCost = $page->current_price ?? '350';
        
        $bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $productCostEn = str_replace($bn, $en, $productCost);
        
        $productCostNum = (float) filter_var($productCostEn, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        if ($productCostNum <= 0) $productCostNum = 350;
        
        $shippingCost = (float) $data['shipping'];
        $totalAmount = $productCostNum + $shippingCost;

        // Create Order
        Order::create([
            'landing_page_id' => $page->id,
            'customer_id' => $customer->id,
            'shipping_area' => $shippingCost == 60 ? 'Inside Dhaka' : 'Outside Dhaka',
            'shipping_cost' => $shippingCost,
            'product_cost' => $productCostNum,
            'total_amount' => $totalAmount,
            'status' => 'Pending'
        ]);

        return redirect()->back()->with('success', 'আপনার অর্ডারটি সফলভাবে সম্পন্ন হয়েছে। আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব।');
    }
}
