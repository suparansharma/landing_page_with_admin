<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use App\Models\Customer;
use App\Models\Order;
use App\Models\IncompleteOrder;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $pages = LandingPage::latest()->get();
        $officeProfile = \App\Models\OfficeProfile::first();
        return view('home', compact('pages', 'officeProfile'));
    }
    public function show($slug)
    {
        $page = LandingPage::where('slug', $slug)->firstOrFail();
        return view('landing', compact('page'));
    }

    public function storeIncompleteOrder(Request $request, $slug)
    {
        $page = LandingPage::where('slug', $slug)->firstOrFail();
        $sessionId = session()->getId();

        IncompleteOrder::updateOrCreate(
            ['session_id' => $sessionId, 'landing_page_id' => $page->id],
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
            ]
        );

        return response()->json(['success' => true]);
    }

    public function storeOrder(Request $request, $slug)
    {
        $page = LandingPage::where('slug', $slug)->firstOrFail();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'product_option_index' => 'nullable|integer',
            'quantity' => 'nullable|integer|min:1'
        ]);

        // Create Customer
        $customer = Customer::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);

        $productCostNum = 0;
        $selectedOptionName = null;

        if ($page->product_options && is_array($page->product_options) && isset($data['product_option_index'])) {
            $options = $page->product_options;
            $index = (int) $data['product_option_index'];
            if (isset($options[$index])) {
                $productCostNum = (float) $options[$index]['price'];
                $selectedOptionName = $options[$index]['name'];
            }
        }

        // Fallback if no option selected or invalid index
        if ($productCostNum <= 0) {
            $productCost = $page->current_price ?? '350';
            $bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
            $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            $productCostEn = str_replace($bn, $en, $productCost);
            $productCostNum = (float) filter_var($productCostEn, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            if ($productCostNum <= 0) $productCostNum = 350;
            
            $selectedOptionName = $page->weight_text ?? 'ইলিশ মাছের আচার (২০০ গ্রাম)';
        }

        $quantity = $data['quantity'] ?? 1;
        $totalProductCost = $productCostNum * $quantity;

        $shippingCost = 100.00;
        $totalAmount = $totalProductCost + $shippingCost;

        // Create Order
        $order = Order::create([
            'landing_page_id' => $page->id,
            'customer_id' => $customer->id,
            'shipping_area' => 'Flat Shipping',
            'shipping_cost' => $shippingCost,
            'product_cost' => $totalProductCost,
            'total_amount' => $totalAmount,
            'product_option' => $selectedOptionName . ' (Qty: ' . $quantity . ')',
            'status' => 'Pending'
        ]);

        // Remove incomplete order if exists for this session
        $sessionId = session()->getId();
        IncompleteOrder::where('session_id', $sessionId)
            ->where('landing_page_id', $page->id)
            ->delete();

        return redirect()->back()
            ->with('success', 'আপনার অর্ডারটি সফলভাবে সম্পন্ন হয়েছে। আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব।')
            ->with('order_id', $order->id)
            ->with('order_total', $order->total_amount);
    }
}
