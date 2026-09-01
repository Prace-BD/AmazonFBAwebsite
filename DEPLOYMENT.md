# Windows Laragon Deployment & Setup Guide

This guide details how to deploy and run the **OYL Legacy** Laravel e-commerce platform on Windows using **Laragon**.

---

## 📋 1. Prerequisites

Make sure you have Laragon installed on your Windows machine:
- **Laragon Full / WAMP Edition** (Downloaded from [laragon.org](https://laragon.org/))
- **PHP Version:** PHP 8.2 or PHP 8.3 (Enabled in Laragon: Right Click > PHP > Version > select 8.2+)
- **Composer:** Included with Laragon (`composer -V`)
- **Web Server:** Apache or Nginx (Included with Laragon)

---

## 🚀 2. Setting Up the Project in Laragon

### Option A: Standard Laragon `www` Directory
Copy or clone the project directly into Laragon's `www` folder:
```
C:\laragon\www\AmazonFBAsite
```
*Laragon will automatically create a local virtual host at `http://amazonfbasite.test`.*

### Option B: Custom Workspace Directory (Current Setup)
If your project is located in a custom development folder (e.g. `C:\Users\Bloodtek\Documents\dev\AmazonFBAsite`):
1. Open **Laragon**.
2. Right-click anywhere in Laragon > **Laragon** > **Root directory** > click **Change...**
3. Select your project folder: `C:\Users\Bloodtek\Documents\dev\AmazonFBAsite`.
4. The included root `index.php` and `.htaccess` will automatically handle routing so `http://localhost/` works directly.

---

## ⚙️ 3. Environment & Database Configuration

1. **Open Laragon Terminal:**
   Click the **Terminal** button in Laragon (or open PowerShell).

2. **Navigate to the Project:**
   ```powershell
   cd C:\Users\Bloodtek\Documents\dev\AmazonFBAsite
   ```

3. **Configure the Environment File:**
   If `.env` does not exist, copy `.env.example`:
   ```powershell
   copy .env.example .env
   ```

4. **Generate Application Key:**
   ```powershell
   php artisan key:generate
   ```

5. **Configure Database (SQLite is Default & Pre-Configured):**
   Ensure `.env` contains:
   ```ini
   DB_CONNECTION=sqlite
   DB_DATABASE=database/database.sqlite
   ```
   If `database.sqlite` does not exist, create it:
   ```powershell
   New-Item -ItemType File -Path database\database.sqlite -Force
   ```

---

## 🗄️ 4. Run Migrations and Seeders

Run the migration and database seeder to populate the global settings, USD packages, blog articles, and default admin user:

```powershell
php artisan migrate:fresh --seed
```

---

## 🌐 5. Starting Laragon & Accessing the Site

1. In Laragon, click **Start All** (Starts Apache and MySQL/Services).
2. Open your web browser and navigate to:
   - **Homepage:** `http://localhost/` (or `http://amazonfbasite.test/`)
   - **Page Directory:** `http://localhost/pages`
   - **Admin Control Center:** `http://localhost/admin`

---

## 🔐 6. Default Admin Credentials

The admin panel is protected behind a database-synced authentication gateway:

| Field | Value |
|---|---|
| **Login URL** | `http://localhost/admin/login` (or `/admin`) |
| **Admin Email** | `admin@oyllegacy.com` |
| **Default Password** | `admin123` |

> **Updating the Password:** You can change this password at any time inside the Admin Panel under the **"Security & Password"** tab.

---

## 🛠️ 7. Common Maintenance Commands

If you ever make design, route, or configuration changes, run these quick maintenance commands:

```powershell
# Clear all caches (config, routes, views, settings)
php artisan optimize:clear

# Clear cached site settings
php artisan cache:clear

# Re-seed fresh database (WARNING: resets all custom data)
php artisan migrate:fresh --seed
```

---

## 📁 8. Project Directory Structure Summary

```
AmazonFBAsite/
├── .htaccess             # Root rewrite rule for Laragon Apache DocumentRoot
├── index.php             # Root front-controller for Laragon
├── app/
│   ├── Http/Controllers # PageController, AdminThemeController, LeadController, AdminAuthController
│   ├── Models/           # SiteSetting, Package, Lead, BlogPost, User
│   └── Mail/             # LeadForwardedMail (Mail forwarding system)
├── database/
│   ├── migrations/       # SQLite database schema migrations
│   └── seeders/          # DatabaseSeeder (Default settings, USD packages, Admin credentials)
├── public/
│   ├── css/theme.css     # Global responsive CSS design system
│   └── js/theme.js       # Frontend UI animations & interactive drawers
├── resources/views/
│   ├── layouts/app.blade.php # Persistent master header & footer layout
│   ├── pages/            # 16+ pages (Home, About, Services, Legal Policies)
│   └── admin/            # Theme Control Center & Login Gateway
└── routes/
    └── web.php           # All clean web routes
```
