<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Lead Received</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #f8fafc; margin: 0; padding: 20px; color: #1e293b; }
        .email-container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 10px; overflow: hidden; border: 1px solid #e2e8f0; }
        .email-header { background: #0f172a; padding: 24px; text-align: center; color: #ffffff; }
        .email-header h2 { margin: 0; font-size: 20px; color: #f88902; }
        .email-body { padding: 24px; }
        .info-table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        .info-table td { padding: 10px 12px; border-bottom: 1px solid #e2e8f0; font-size: 14px; }
        .info-label { font-weight: bold; width: 35%; color: #64748b; }
        .message-box { background: #f1f5f9; padding: 15px; border-radius: 6px; margin-top: 15px; font-size: 14px; line-height: 1.6; }
        .email-footer { background: #f8fafc; padding: 16px; text-align: center; font-size: 12px; color: #94a3b8; border-top: 1px solid #e2e8f0; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>⚡ New Consultation Lead Received</h2>
            <p style="margin: 5px 0 0; font-size: 13px; color: #94a3b8;">AmazonConsultant.ae Automated Forwarding</p>
        </div>
        <div class="email-body">
            <p>You have received a new inquiry from the website:</p>
            <table class="info-table">
                <tr>
                    <td class="info-label">Client Name:</td>
                    <td><strong>{{ $lead->name }}</strong></td>
                </tr>
                <tr>
                    <td class="info-label">Email Address:</td>
                    <td><a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></td>
                </tr>
                <tr>
                    <td class="info-label">Phone / WhatsApp:</td>
                    <td><a href="tel:{{ $lead->phone }}">{{ $lead->phone ?? 'Not provided' }}</a></td>
                </tr>
                <tr>
                    <td class="info-label">Service Interested:</td>
                    <td><span style="background:#fff4e5; color:#f88902; padding:3px 8px; border-radius:4px; font-weight:bold;">{{ $lead->service_interested ?? 'General Inquiry' }}</span></td>
                </tr>
                <tr>
                    <td class="info-label">Estimated Budget:</td>
                    <td>{{ $lead->budget ?? 'Flexible' }}</td>
                </tr>
                <tr>
                    <td class="info-label">Source Page:</td>
                    <td>{{ $lead->source_page ?? 'Homepage' }}</td>
                </tr>
                <tr>
                    <td class="info-label">Submission Time:</td>
                    <td>{{ $lead->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            </table>

            @if($lead->message)
                <h4 style="margin-top: 20px; margin-bottom: 5px; color: #0f172a;">Client Message:</h4>
                <div class="message-box">
                    {{ $lead->message }}
                </div>
            @endif

            <div style="margin-top: 25px; text-align: center;">
                <a href="mailto:{{ $lead->email }}?subject=Re:%20Your%20Inquiry%20with%20AmazonConsultant.ae" style="background: #f88902; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 6px; font-weight: bold; display: inline-block;">Reply to Client Directly</a>
            </div>
        </div>
        <div class="email-footer">
            AmazonConsultant.ae • OYL Legacy Platform • Automated Mail Notification System
        </div>
    </div>
</body>
</html>
