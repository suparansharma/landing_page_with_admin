<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $pages = LandingPage::latest()->paginate(10);
        return view('admin.landing_pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.landing_pages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'slug' => 'required|unique:landing_pages',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'phone_number' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|max:2048',
            'secondary_image' => 'nullable|image|max:2048',
            'features' => 'nullable|string',
            'premium_text' => 'nullable|string|max:255',
            'weight_text' => 'nullable|string|max:255',
            'old_price' => 'nullable|string|max:255',
            'current_price' => 'nullable|string|max:255',
            'delivery_text' => 'nullable|string|max:255',
            'guarantee_text' => 'nullable|string|max:255',
            'alert_text' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('landing_pages', 'public');
        }
        if ($request->hasFile('secondary_image')) {
            $data['secondary_image'] = $request->file('secondary_image')->store('landing_pages', 'public');
        }

        if(!empty($data['features'])) {
            // Split by newline and save as JSON
            $features = array_filter(array_map('trim', explode("\n", $data['features'])));
            $data['features'] = json_encode(array_values($features), JSON_UNESCAPED_UNICODE);
        }

        LandingPage::create($data);

        return redirect()->route('admin.landing-pages.index')->with('success', 'Landing Page created successfully.');
    }

    public function edit(LandingPage $landingPage)
    {
        return view('admin.landing_pages.edit', compact('landingPage'));
    }

    public function update(Request $request, LandingPage $landingPage)
    {
        $data = $request->validate([
            'slug' => 'required|unique:landing_pages,slug,' . $landingPage->id,
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'phone_number' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|max:2048',
            'secondary_image' => 'nullable|image|max:2048',
            'features' => 'nullable|string',
            'premium_text' => 'nullable|string|max:255',
            'weight_text' => 'nullable|string|max:255',
            'old_price' => 'nullable|string|max:255',
            'current_price' => 'nullable|string|max:255',
            'delivery_text' => 'nullable|string|max:255',
            'guarantee_text' => 'nullable|string|max:255',
            'alert_text' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('landing_pages', 'public');
        }
        if ($request->hasFile('secondary_image')) {
            $data['secondary_image'] = $request->file('secondary_image')->store('landing_pages', 'public');
        }

        if(isset($data['features'])) {
            $features = array_filter(array_map('trim', explode("\n", $data['features'])));
            $data['features'] = json_encode(array_values($features), JSON_UNESCAPED_UNICODE);
        } else {
            $data['features'] = json_encode([]);
        }

        $landingPage->update($data);

        return redirect()->route('admin.landing-pages.index')->with('success', 'Landing Page updated successfully.');
    }

    public function destroy(LandingPage $landingPage)
    {
        $landingPage->delete();
        return redirect()->route('admin.landing-pages.index')->with('success', 'Landing Page deleted successfully.');
    }
}
