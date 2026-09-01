@extends('layouts.app')

@section('title', 'Admin Gateway Login - ' . \App\Models\SiteSetting::get('site_name', 'OYL Legacy'))

@section('content')
<section class="section-padding" style="min-height: 75vh; display: flex; align-items: center; background: radial-gradient(circle at center, rgba(248, 137, 2, 0.08), transparent 70%), var(--surface-alt);">
    <div class="container" style="max-width: 480px;">
        <div class="lead-intake-card" style="padding: 40px; box-shadow: var(--shadow-lg); border: 1px solid var(--border-color); background: #ffffff;">
            
            <div style="text-align: center; margin-bottom: 28px;">
                <div style="width: 58px; height: 58px; border-radius: 14px; background: var(--primary-light); color: var(--primary); display: inline-flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 16px;">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="badge badge-primary" style="margin-bottom: 10px;">Security Gateway</div>
                <h2 style="font-size: 24px; font-weight: 800; color: var(--accent); margin-bottom: 6px;">Admin Control Center</h2>
                <p style="font-size: 13.5px; color: var(--text-muted);">Enter your database credentials to access OYL Legacy settings.</p>
            </div>

            @if(session('error'))
                <div class="alert alert-error" style="margin-bottom: 20px;">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <div>{{ session('error') }}</div>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success" style="margin-bottom: 20px;">
                    <i class="fa-solid fa-circle-check"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="form-label" style="display: flex; justify-content: space-between;">
                        <span>Admin Email</span>
                        <span style="font-size: 11px; color: var(--text-muted);">Default: admin@oyllegacy.com</span>
                    </label>
                    <div style="position: relative;">
                        <input type="email" name="email" class="form-control" value="{{ old('email', 'admin@oyllegacy.com') }}" required style="padding-left: 38px;">
                        <i class="fa-solid fa-envelope" style="position: absolute; left: 14px; top: 14px; color: var(--text-muted); font-size: 14px;"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" style="display: flex; justify-content: space-between;">
                        <span>Admin Password</span>
                        <span style="font-size: 11px; color: var(--primary); font-weight: 600;">Default: admin123</span>
                    </label>
                    <div style="position: relative;">
                        <input type="password" id="adminPassword" name="password" class="form-control" placeholder="••••••••" required style="padding-left: 38px; padding-right: 38px;">
                        <i class="fa-solid fa-key" style="position: absolute; left: 14px; top: 14px; color: var(--text-muted); font-size: 14px;"></i>
                        <button type="button" onclick="togglePassVisibility()" style="position: absolute; right: 12px; top: 11px; background: none; border: none; cursor: pointer; color: var(--text-muted); font-size: 14px;">
                            <i class="fa-solid fa-eye" id="togglePassIcon"></i>
                        </button>
                    </div>
                </div>

                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; font-size: 13px;">
                    <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: var(--text-dark);">
                        <input type="checkbox" name="remember" value="1" checked style="accent-color: var(--primary); width: 16px; height: 16px;">
                        <span>Keep me logged in</span>
                    </label>
                    <span style="color: var(--text-muted);"><i class="fa-solid fa-database"></i> Synced with DB</span>
                </div>

                <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                    <i class="fa-solid fa-unlock-keyhole"></i>
                    <span>Unlock Admin Panel</span>
                </button>
            </form>

            <div style="text-align: center; margin-top: 24px; padding-top: 18px; border-top: 1px solid var(--border-color); font-size: 12.5px; color: var(--text-muted);">
                <i class="fa-solid fa-shield-halved" style="color: var(--primary); margin-right: 4px;"></i>
                Protected by OYL Legacy Authentication System
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
function togglePassVisibility() {
    const input = document.getElementById('adminPassword');
    const icon = document.getElementById('togglePassIcon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>
@endpush
@endsection
