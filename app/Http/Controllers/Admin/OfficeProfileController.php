<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficeProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficeProfileController extends Controller
{
    public function index()
    {
        $profile = OfficeProfile::firstOrCreate([], [
            'name' => 'Our Company'
        ]);
        return view('admin.office_profile.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = OfficeProfile::firstOrCreate([]);
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'facebook' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('logo')) {
            if ($profile->logo && Storage::disk('public')->exists($profile->logo)) {
                Storage::disk('public')->delete($profile->logo);
            }
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $profile->update($data);

        return redirect()->back()->with('success', 'Office Profile updated successfully.');
    }
}
