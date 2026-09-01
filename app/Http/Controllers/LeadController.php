<?php

namespace App\Http\Controllers;

use App\Mail\LeadForwardedMail;
use App\Models\Lead;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    /**
     * Store incoming lead and forward via mail
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'service_interested' => 'nullable|string|max:255',
            'budget' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:3000',
            'source_page' => 'nullable|string|max:255',
        ]);

        $lead = Lead::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'service_interested' => $validated['service_interested'] ?? 'General Inquiry',
            'budget' => $validated['budget'] ?? null,
            'message' => $validated['message'] ?? null,
            'source_page' => $validated['source_page'] ?? url()->previous(),
            'ip_address' => $request->ip(),
            'status' => 'new',
        ]);

        // Attempt mail forwarding
        $isForwardingEnabled = SiteSetting::get('mail_forwarding_enabled', '1') == '1';
        $forwardTo = SiteSetting::get('mail_forward_to_email', 'info@amazonconsultant.ae');

        if ($isForwardingEnabled && $forwardTo) {
            try {
                $recipients = array_map('trim', explode(',', $forwardTo));
                Mail::to($recipients)->send(new LeadForwardedMail($lead));
                
                $lead->update([
                    'is_forwarded' => true,
                    'forwarded_at' => now(),
                ]);
            } catch (\Exception $e) {
                Log::error('Lead mail forwarding failed: ' . $e->getMessage());
                $lead->update([
                    'is_forwarded' => false,
                    'forwarding_error' => $e->getMessage(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Thank you! Your request has been received. Our senior e-commerce consultant will contact you within 15 minutes.');
    }
}
