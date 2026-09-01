<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Package;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminThemeController extends Controller
{
    /**
     * Check authentication helper
     */
    protected function ensureAuthenticated()
    {
        if (!Auth::check()) {
            abort(redirect()->route('admin.login')->with('error', 'Please enter your password to access the Admin Control Center.'));
        }
    }

    /**
     * Unified Theme Control Center (OYL Legacy Dashboard)
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Please enter your password to access the Admin Control Center.');
        }

        $settings = SiteSetting::all()->groupBy('group');
        $packages = Package::orderBy('order', 'asc')->get();
        $leads = Lead::orderBy('created_at', 'desc')->paginate(20);
        $leadStats = [
            'total' => Lead::count(),
            'new' => Lead::where('status', 'new')->count(),
            'forwarded' => Lead::where('is_forwarded', true)->count(),
        ];

        return view('admin.theme_control', compact('settings', 'packages', 'leads', 'leadStats'));
    }

    /**
     * Update Global Site & Theme Settings
     */
    public function updateSettings(Request $request)
    {
        $this->ensureAuthenticated();

        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        SiteSetting::clearCache();

        return redirect()->back()->with('success', 'Unified Theme Settings successfully updated! Global changes applied across all pages.');
    }

    /**
     * Update Package Pricing & Features (USD)
     */
    public function updatePackage(Request $request, Package $package)
    {
        $this->ensureAuthenticated();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'platform' => 'required|string|max:100',
            'subtitle' => 'nullable|string|max:500',
            'price_usd' => 'required|numeric|min:0',
            'original_price_usd' => 'nullable|numeric|min:0',
            'discount_badge' => 'nullable|string|max:100',
            'badge_text' => 'nullable|string|max:100',
            'cta_text' => 'required|string|max:100',
            'features_raw' => 'nullable|string',
            'is_popular' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        $features = array_filter(array_map('trim', explode("\n", $request->input('features_raw', ''))));

        $package->update([
            'name' => $validated['name'],
            'platform' => $validated['platform'],
            'subtitle' => $validated['subtitle'] ?? null,
            'price_usd' => $validated['price_usd'],
            'original_price_usd' => $validated['original_price_usd'] ?? null,
            'discount_badge' => $validated['discount_badge'] ?? null,
            'badge_text' => $validated['badge_text'] ?? null,
            'cta_text' => $validated['cta_text'],
            'features' => array_values($features),
            'is_popular' => $request->has('is_popular'),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->back()->with('success', "Package '{$package->name}' updated successfully.");
    }

    /**
     * Store New Package
     */
    public function storePackage(Request $request)
    {
        $this->ensureAuthenticated();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'platform' => 'required|string|max:100',
            'price_usd' => 'required|numeric|min:0',
            'features_raw' => 'nullable|string',
        ]);

        $features = array_filter(array_map('trim', explode("\n", $request->input('features_raw', ''))));

        Package::create([
            'name' => $validated['name'],
            'platform' => $validated['platform'],
            'subtitle' => $request->input('subtitle', 'Complete automation package'),
            'price_usd' => $validated['price_usd'],
            'original_price_usd' => $request->input('original_price_usd'),
            'discount_badge' => $request->input('discount_badge', 'Save 40%!'),
            'badge_text' => $request->input('badge_text'),
            'cta_text' => $request->input('cta_text', 'Launch My Store'),
            'features' => array_values($features),
            'is_popular' => $request->has('is_popular'),
            'is_active' => true,
            'order' => Package::count() + 1,
        ]);

        return redirect()->back()->with('success', "New package '{$validated['name']}' created successfully.");
    }

    /**
     * Update Lead Status
     */
    public function updateLeadStatus(Request $request, Lead $lead)
    {
        $this->ensureAuthenticated();

        $lead->update([
            'status' => $request->input('status', 'contacted'),
        ]);

        return redirect()->back()->with('success', 'Lead status updated.');
    }

    /**
     * Delete Lead
     */
    public function destroyLead(Lead $lead)
    {
        $this->ensureAuthenticated();

        $lead->delete();
        return redirect()->back()->with('success', 'Lead record deleted.');
    }
}
