<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_url' => 'nullable|url',
            'logo_path' => 'nullable|image|max:2048',
        ]);

        $setting = new Setting();

        if ($request->hasFile('logo_path')) {
            $file = $request->file('logo_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('images/logo_path');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $setting->logo_path = 'images/logo_path/' . $filename;
        }

        $setting->company_name = $validated['company_name'];
        $setting->company_url = $validated['company_url'] ?? null;
        $setting->save();

        return redirect()->back()->with('success', 'Setting created successfully!');
    }

public function update(Request $request, Setting $setting)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_url' => 'nullable|url',
            'logo_path' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('logo_path')) {
            if ($setting->logo_path && file_exists(public_path($setting->logo_path))) {
                unlink(public_path($setting->logo_path));
            }

            $file = $request->file('logo_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('images/logo_path');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $setting->logo_path = 'images/logo_path/' . $filename;
        }

        $setting->update([
            'company_name' => $validated['company_name'],
            'company_url' => $validated['company_url'],
        ]);

        return redirect()->back()->with('success', 'Setting updated successfully!');
    }


    public function destroy(Setting $setting)
    {
        if ($setting->logo_path && file_exists(public_path($setting->logo_path))) {
            unlink(public_path($setting->logo_path));
        }

        $setting->delete();

        return redirect()->back()->with('success', 'Setting deleted successfully!');
    }
}
