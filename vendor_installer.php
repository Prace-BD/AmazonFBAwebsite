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

putenv('COMPOSER_ALLOW_SUPERUSER=1');
putenv('COMPOSER_NO_INTERACTION=1');

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
        .btn { display: inline-block; background: #f88902; color: #fff; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-weight: bold; margin-top: 15px; }
        .btn-green { background: #16a34a; }
        .status-ok { color: #4ade80; font-weight: bold; }
        .status-err { color: #f87171; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <h1>⚡ YL Legacy Deployment & Vendor Setup</h1>
    
    <?php
    // Step 1: Environment Setup (.env)
    echo "<h3>1. Application Environment Configuration</h3>";
    $envPath = __DIR__ . '/.env';
    $envExamplePath = __DIR__ . '/.env.example';

    if (!file_exists($envPath)) {
        if (file_exists($envExamplePath)) {
            copy($envExamplePath, $envPath);
            echo "<p class='status-ok'>✅ Created <code>.env</code> file from <code>.env.example</code>.</p>";
        } else {
            // Embedded default .env template
            $defaultEnv = "APP_NAME=\"YL Legacy\"\nAPP_ENV=production\nAPP_KEY=\nAPP_DEBUG=false\nAPP_URL=https://yllegacy.com\n\nDB_CONNECTION=sqlite\nDB_DATABASE=" . __DIR__ . "/database/database.sqlite\n\nSESSION_DRIVER=file\nCACHE_STORE=file\nQUEUE_CONNECTION=sync\n";
            file_put_contents($envPath, $defaultEnv);
            echo "<p class='status-ok'>✅ Created standard <code>.env</code> file.</p>";
        }
    } else {
        echo "<p class='status-ok'>✅ <code>.env</code> file exists.</p>";
    }

    // Ensure database.sqlite exists if using sqlite
    $dbPath = __DIR__ . '/database/database.sqlite';
    if (!file_exists($dbPath)) {
        @mkdir(__DIR__ . '/database', 0755, true);
        @touch($dbPath);
        echo "<p class='status-ok'>✅ Created SQLite database at <code>database/database.sqlite</code>.</p>";
    }

    // Generate APP_KEY if missing
    $envContent = file_exists($envPath) ? file_get_contents($envPath) : '';
    if (!preg_match('/APP_KEY=base64:[A-Za-z0-9+\/=]+/', $envContent)) {
        $key = 'base64:' . base64_encode(random_bytes(32));
        if (strpos($envContent, 'APP_KEY=') !== false) {
            $envContent = preg_replace('/APP_KEY=.*/', 'APP_KEY=' . $key, $envContent);
        } else {
            $envContent .= "\nAPP_KEY=" . $key;
        }
        file_put_contents($envPath, $envContent);
        echo "<p class='status-ok'>✅ Generated application key: <code>$key</code></p>";
    } else {
        echo "<p class='status-ok'>✅ Application key is configured.</p>";
    }

    // Step 2: Check Vendor Directory
    echo "<h3>2. Composer Dependencies (<code>vendor/</code>)</h3>";
    $vendorAutoload = __DIR__ . '/vendor/autoload.php';

    if (file_exists($vendorAutoload)) {
        echo "<p class='status-ok'>🎉 <code>vendor/autoload.php</code> is installed and ready!</p>";
        echo "<a href='/deploy/install?secret=yllegacy2026' class='btn btn-green'>Proceed to Database Migration & Setup →</a>";
    } else {
        echo "<p>⏳ <code>vendor/</code> directory not found. Attempting web-based composer installation...</p>";

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
            echo "<p>Running Composer installation (with <code>register_argc_argv=0</code> bypass)...</p>";
            
            $phpBin = PHP_BINARY ? PHP_BINARY : 'php';
            // -d register_argc_argv=0 bypasses the non-CLI SAPI check in Composer
            $cmd = escapeshellcmd($phpBin) . ' -d register_argc_argv=0 ' . escapeshellarg($pharPath) . ' install --no-dev --optimize-autoloader 2>&1';
            
            $output = [];
            $returnCode = -1;
            @exec($cmd, $output, $returnCode);

            echo "<pre>" . htmlspecialchars(implode("\n", $output)) . "</pre>";

            if (file_exists($vendorAutoload)) {
                echo "<h3 class='status-ok'>🎉 Composer Installation Successful!</h3>";
                echo "<a href='/deploy/install?secret=yllegacy2026' class='btn btn-green'>Proceed to Database Migration & Setup →</a>";
            } else {
                echo "<p class='status-err'>⚠️ Automated composer execution finished with code $returnCode.</p>";
                echo "<p>Retrying using alternative CLI PHP binary...</p>";
                
                // Fallback attempt with system php CLI path
                $altCmd = '/usr/local/bin/php -d register_argc_argv=0 ' . escapeshellarg($pharPath) . ' install --no-dev --optimize-autoloader 2>&1';
                $altOutput = [];
                @exec($altCmd, $altOutput, $altReturn);
                echo "<pre>" . htmlspecialchars(implode("\n", $altOutput)) . "</pre>";

                if (file_exists($vendorAutoload)) {
                    echo "<h3 class='status-ok'>🎉 Composer Installation Successful!</h3>";
                    echo "<a href='/deploy/install?secret=yllegacy2026' class='btn btn-green'>Proceed to Database Migration & Setup →</a>";
                }
            }
        }
    }
    ?>
</div>
</body>
</html>
