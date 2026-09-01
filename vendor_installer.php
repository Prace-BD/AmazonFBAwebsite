<?php
/**
 * YL Legacy - Web-Based Standalone Vendor & Deployment Setup Script
 * Safe for Shared Hosting / cPanel environments without SSH access.
 */
ini_set('display_errors', 1);
ini_set('register_argc_argv', '0');
ini_set('memory_limit', '512M');
error_reporting(E_ALL);
set_time_limit(600);

$baseDir = __DIR__;
$composerHome = $baseDir . '/.composer';

if (!file_exists($composerHome)) {
    @mkdir($composerHome, 0777, true);
}

putenv("HOME=$baseDir");
putenv("COMPOSER_HOME=$composerHome");
putenv("COMPOSER_ALLOW_SUPERUSER=1");
putenv("COMPOSER_NO_INTERACTION=1");

$_SERVER['HOME'] = $baseDir;
$_SERVER['COMPOSER_HOME'] = $composerHome;

// Wipe stale bootstrap cache files
foreach (glob(__DIR__ . '/bootstrap/cache/*.php') as $cacheFile) {
    @unlink($cacheFile);
}

$envPath = __DIR__ . '/.env';
$envExamplePath = __DIR__ . '/.env.example';

// Auto-inject MySQL password if provided or posted
$providedDbPass = '?n%@W(+XWaDi9Cg';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_db') {
    $dbPass = trim($_POST['db_password'] ?? '');
    if ($dbPass !== '') {
        $providedDbPass = $dbPass;
    }
}

// Always ensure MySQL config with default length is saved to .env
$newEnv = "APP_NAME=\"YL Legacy\"\n";
$newEnv .= "APP_ENV=production\n";
$newEnv .= "APP_KEY=base64:" . base64_encode(random_bytes(32)) . "\n";
$newEnv .= "APP_DEBUG=false\n";
$newEnv .= "APP_URL=https://yllegacy.com\n\n";

$newEnv .= "DB_CONNECTION=mysql\n";
$newEnv .= "DB_HOST=127.0.0.1\n";
$newEnv .= "DB_PORT=3306\n";
$newEnv .= "DB_DATABASE=yllexfbh_user_yllegacy\n";
$newEnv .= "DB_USERNAME=yllexfbh_yllegacy786\n";
$newEnv .= "DB_PASSWORD=\"{$providedDbPass}\"\n\n";

$newEnv .= "SESSION_DRIVER=file\n";
$newEnv .= "CACHE_STORE=file\n";
$newEnv .= "QUEUE_CONNECTION=sync\n";

file_put_contents($envPath, $newEnv);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YL Legacy Deployment Setup</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; background: #0f172a; color: #f8fafc; padding: 40px 20px; line-height: 1.6; }
        .container { max-width: 800px; margin: 0 auto; background: #1e293b; padding: 30px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
        h1 { color: #f88902; margin-top: 0; }
        pre { background: #090d16; color: #38bdf8; padding: 15px; border-radius: 8px; overflow-x: auto; font-size: 14px; max-height: 400px; }
        .btn { display: inline-block; background: #f88902; color: #fff; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-weight: bold; margin-top: 15px; border: none; cursor: pointer; }
        .btn-green { background: #16a34a; }
        .status-ok { color: #4ade80; font-weight: bold; }
        .status-err { color: #f87171; font-weight: bold; }
        .box { background: #0f172a; padding: 20px; border-radius: 8px; margin-bottom: 25px; border: 1px solid #334155; }
    </style>
</head>
<body>
<div class="container">
    <h1>⚡ YL Legacy Deployment & Database Setup</h1>
    
    <div class="box">
        <p class="status-ok">✅ Database connection configured to <code>yllexfbh_user_yllegacy</code> with Schema string length compatibility!</p>
    </div>

    <?php
    // Step 2: Check Vendor Directory & Run Migration
    echo "<h3>Composer Dependencies & Database Migration</h3>";
    $vendorAutoload = __DIR__ . '/vendor/autoload.php';

    if (file_exists($vendorAutoload)) {
        echo "<p class='status-ok'>🎉 <code>vendor/autoload.php</code> is installed and ready!</p>";
        
        try {
            require_once $vendorAutoload;
            $app = require_once __DIR__ . '/bootstrap/app.php';
            
            $kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
            $kernel->bootstrap();

            \Illuminate\Support\Facades\Schema::defaultStringLength(191);

            \Illuminate\Support\Facades\Artisan::call('key:generate', ['--force' => true]);
            $keyOut = \Illuminate\Support\Facades\Artisan::output();
            
            \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
            $migOut = \Illuminate\Support\Facades\Artisan::output();
            
            \Illuminate\Support\Facades\Artisan::call('optimize:clear');
            $optOut = \Illuminate\Support\Facades\Artisan::output();

            foreach (glob(__DIR__ . '/bootstrap/cache/*.php') as $cacheFile) {
                @unlink($cacheFile);
            }
            
            echo "<h3 class='status-ok'>🎉 Database Migration & Seed Successful!</h3>";
            echo "<pre style='background:#090d16;color:#4ade80;padding:15px;border-radius:8px;'>" . htmlspecialchars($keyOut) . "\n" . htmlspecialchars($migOut) . "\n" . htmlspecialchars($optOut) . "</pre>";
            echo "<p><a href='/admin' class='btn btn-green'>Go to Admin Control Center →</a></p>";
            echo "<p><a href='/' class='btn' style='background:#0284c7;margin-left:10px;'>Visit Website Homepage →</a></p>";
        } catch (\Throwable $e) {
            echo "<p class='status-err'>Database Migration Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    } else {
        echo "<p>⏳ <code>vendor/</code> directory not found. Running Composer installation...</p>";

        $pharPath = __DIR__ . '/composer.phar';
        if (!file_exists($pharPath)) {
            echo "<p>Downloading <code>composer.phar</code> from Official Composer site...</p>";
            $pharContent = @file_get_contents('https://getcomposer.org/composer-stable.phar');
            if ($pharContent) {
                file_put_contents($pharPath, $pharContent);
                echo "<p class='status-ok'>✅ <code>composer.phar</code> downloaded successfully.</p>";
            } else {
                echo "<p class='status-err'>❌ Direct HTTP download of composer.phar failed.</p>";
            }
        }

        if (file_exists($pharPath)) {
            echo "<p>Executing Composer with explicit HOME environment...</p>";
            
            $envPrefix = "export HOME=" . escapeshellarg($baseDir) . "; export COMPOSER_HOME=" . escapeshellarg($composerHome) . "; ";
            $phpBinaries = ['/usr/local/bin/php', '/usr/bin/php', PHP_BINARY];
            $installed = false;

            foreach ($phpBinaries as $bin) {
                if ($installed) break;
                
                $cmd = $envPrefix . escapeshellcmd($bin) . ' ' . escapeshellarg($pharPath) . ' install --no-dev --optimize-autoloader 2>&1';
                
                $output = [];
                $returnCode = -1;
                @exec($cmd, $output, $returnCode);

                echo "<p>Running: <code>" . htmlspecialchars($cmd) . "</code></p>";
                echo "<pre>" . htmlspecialchars(implode("\n", $output)) . "</pre>";

                if (file_exists($vendorAutoload)) {
                    $installed = true;
                    echo "<h3 class='status-ok'>🎉 Composer Installation Successful! Refreshing page to migrate database...</h3>";
                    echo "<script>setTimeout(function(){ window.location.reload(); }, 1000);</script>";
                }
            }
        }
    }
    ?>
</div>
</body>
</html>
