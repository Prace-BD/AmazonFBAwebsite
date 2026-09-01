# 🚀 Namecheap Stellar Hosting Deployment Guide for YL Legacy (Laravel)

This step-by-step guide covers how to deploy the **YL Legacy** Laravel application on **Namecheap Stellar / Stellar Plus (cPanel)** shared hosting.

---

## 📋 Pre-Deployment Checklist

Before beginning, ensure you have:
- Access to your **Namecheap cPanel** (e.g. `https://yourdomain.com:2083` or via Namecheap Dashboard > Hosting List > Go to cPanel).
- Your cPanel username (referred to as `cpanel_user` throughout this guide).
- A registered domain or subdomain pointing to your Namecheap hosting nameservers (`dns1.namecheaphosting.com` & `dns2.namecheaphosting.com`).

---

## ⚡ Method 1: Fast Deployment via cPanel Terminal & Git (Recommended)

Namecheap Stellar includes a built-in **Terminal** and **Git** in cPanel.

### Step 1: Set PHP Version to 8.3
1. Log in to **cPanel**.
2. Under the **Software** section, click **Select PHP Version** (or **MultiPHP Manager**).
3. Set your PHP version to **PHP 8.3** (or 8.2+).
4. Click on the **Extensions** tab and verify the following extensions are enabled:
   - `bcmath`, `ctype`, `curl`, `dom`, `fileinfo`, `json`, `mbstring`, `openssl`, `pdo_mysql`, `pdo_sqlite`, `tokenizer`, `xml`, `zip`.

---

### Step 2: Create MySQL Database & User (or use SQLite)

#### Option A: MySQL Database (Recommended for Production)
1. In cPanel, go to **Databases** > **MySQL® Database Wizard**.
2. **Step 1: Create A Database**: Enter a name (e.g., `cpanel_user_yllegacy`). Click **Next Step**.
3. **Step 2: Create Database Users**: Enter a username (e.g., `cpanel_user_dbuser`) and generate a strong password. Click **Create User**.
4. **Step 3: Add User to Database**: Check **ALL PRIVILEGES** and click **Make Changes**.
5. Save your database name, username, and password for the `.env` configuration.

#### Option B: SQLite Database
If you prefer zero-configuration SQLite:
- No database creation needed in cPanel. Laravel will read `database/database.sqlite`.

---

### Step 3: Clone the Repository via cPanel Terminal

1. In cPanel, go to **Advanced** > **Terminal**.
2. Navigate to your home directory:
   ```bash
   cd ~
   ```
3. Clone your repository into a private directory (`yllegacy`):
   ```bash
   git clone https://github.com/Prace-BD/AmazonFBAwebsite.git yllegacy
   cd yllegacy
   ```

---

### Step 4: Configure the Environment File (`.env`)

1. Copy the example environment file:
   ```bash
   cp .env.example .env
   ```
2. Open and edit `.env` using nano or cPanel File Manager:
   ```bash
   nano .env
   ```
3. Update the production settings:
   ```ini
   APP_NAME="YL Legacy"
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://yourdomain.com

   # For MySQL Database:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=cpanel_user_yllegacy
   DB_USERNAME=cpanel_user_dbuser
   DB_PASSWORD=YourStrongPasswordHere

   # (Or for SQLite):
   # DB_CONNECTION=sqlite
   # DB_DATABASE=/home/cpanel_user/yllegacy/database/database.sqlite
   ```
4. Save and exit (`Ctrl + O`, then `Enter`, then `Ctrl + X` in nano).

---

### Step 5: Install Dependencies & Run Database Migrations

In the cPanel Terminal inside `~/yllegacy`:

1. **Install Composer Dependencies:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```
2. **Generate Application Key:**
   ```bash
   php artisan key:generate --force
   ```
3. **If using SQLite, create database file:**
   ```bash
   touch database/database.sqlite
   ```
4. **Run Migrations & Seed Default Packages, Settings & Admin:**
   ```bash
   php artisan migrate:fresh --seed --force
   ```
5. **Create Public Storage Symlink:**
   ```bash
   php artisan storage:link
   ```
6. **Cache Configuration & Routes for High Performance:**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

---

### Step 6: Connect to `public_html`

For the primary domain on Namecheap Stellar, web traffic serves from `/home/cpanel_user/public_html`.

#### Best Option: Symlink `public_html` to `yllegacy/public`
In the cPanel Terminal:
```bash
cd ~
# Backup or remove empty public_html
rm -rf public_html
# Symlink public directory
ln -s /home/cpanel_user/yllegacy/public /home/cpanel_user/public_html
```
*(Replace `cpanel_user` with your actual cPanel username).*

#### Alternative Option (If your host restricts symlinks):
1. Copy all contents from `~/yllegacy/public/` into `~/public_html/`:
   ```bash
   cp -r ~/yllegacy/public/* ~/public_html/
   cp ~/yllegacy/public/.htaccess ~/public_html/
   ```
2. Edit `~/public_html/index.php`:
   - Change line 14:
     ```php
     require __DIR__.'/../yllegacy/vendor/autoload.php';
     ```
   - Change line 18:
     ```php
     $app = require_once __DIR__.'/../yllegacy/bootstrap/app.php';
     ```

---

## 📦 Method 2: Manual Upload via cPanel File Manager (No SSH/Terminal)

If you prefer using the web browser UI:

1. **Prepare ZIP Locally:**
   - In your local project folder, make sure assets are built (`css/` and `js/` exist in `public/`).
   - Create a ZIP archive of all project files **including hidden files** (`.env.example`, `.htaccess`).
2. **Upload to cPanel:**
   - Open cPanel > **File Manager**.
   - Navigate to `/home/cpanel_user/` (outside `public_html`).
   - Click **Upload** and upload your ZIP file.
   - Right-click the ZIP and click **Extract** into a folder named `yllegacy`.
3. **Move Public Assets:**
   - Go inside `/home/cpanel_user/yllegacy/public/`.
   - Select all files (ensure "Show Hidden Files" is enabled in File Manager Settings).
   - Move all files into `/home/cpanel_user/public_html/`.
4. **Update `public_html/index.php`:**
   - Edit `/home/cpanel_user/public_html/index.php`.
   - Update the paths to:
     ```php
     require __DIR__.'/../yllegacy/vendor/autoload.php';
     $app = require_once __DIR__.'/../yllegacy/bootstrap/app.php';
     ```
5. **Configure `.env`:**
   - In `/home/cpanel_user/yllegacy/`, rename `.env.example` to `.env`.
   - Edit `.env` with your domain URL and cPanel MySQL credentials.
6. **Set File Permissions:**
   - Ensure `/home/cpanel_user/yllegacy/storage` and `/home/cpanel_user/yllegacy/bootstrap/cache` have permission `775` (or `755`).

---

## 🔒 Step 7: Enable Free SSL (HTTPS)

1. In cPanel, navigate to **Security** > **Namecheap SSL** or **SSL/TLS Status**.
2. Select your domain and click **Run AutoSSL** (or install the free cPanel Sectigo / Let's Encrypt SSL certificate).
3. Ensure HTTPS is enforced by checking your site at `https://yourdomain.com`.

---

## 🛡️ Admin Login Credentials

Once deployment and seeding are complete, log in to your admin dashboard:

| Field | Production Value |
|---|---|
| **Admin Login URL** | `https://yourdomain.com/admin` |
| **Email** | `admin@yllegacy.com` |
| **Default Password** | `admin123` |

> ⚠️ **Important Security Note:** Immediately after your first login, visit **Theme Control Center > Security & Password** to update your admin password and email address!

---

## 🔄 How to Pull Future Updates

Whenever you push new updates to GitHub, pull them onto Namecheap Stellar in seconds:

```bash
cd ~/yllegacy
git pull origin main
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan optimize:clear
php artisan optimize
```
