@echo off
setlocal enabledelayedexpansion

:: -----------------------------------------------------------------------------
:: YL Legacy - Laragon PHP & Composer Terminal Launcher
:: -----------------------------------------------------------------------------

:: 1. Auto-detect PHP in Laragon
set "PHP_DIR="
for /d %%D in ("C:\laragon\bin\php\php-*") do (
    set "PHP_DIR=%%D"
)

if "%PHP_DIR%"=="" (
    if exist "C:\laragon\bin\php\php.exe" (
        set "PHP_DIR=C:\laragon\bin\php"
    ) else (
        echo [!] Error: No PHP installation found in C:\laragon\bin\php
        echo Please ensure Laragon is installed with PHP.
        pause
        exit /b 1
    )
)

:: 2. Prepend Laragon Binaries to PATH for this terminal session
set "PATH=%PHP_DIR%;C:\laragon\bin\composer;C:\laragon\bin\nodejs;C:\laragon\bin\git\cmd;C:\Program Files\nodejs;%PATH%"

:: 3. Execute command directly if arguments are passed (e.g., terminal.bat php artisan ...)
if not "%~1"=="" (
    %*
    exit /b %ERRORLEVEL%
)

:: 4. Launch Interactive Terminal
title YL Legacy - Laragon Dev Terminal
cls
echo ===============================================================================
echo   ^⚡ YL LEGACY - LARAGON PHP ^& ARTISAN TERMINAL
echo ===============================================================================
echo.
echo   [*] Active PHP Path : %PHP_DIR%
php -v | findstr /R "^PHP"
composer -V 2>nul
echo.
echo   [*] Commands ready to use:
echo       - php artisan migrate:fresh --seed
echo       - php artisan optimize:clear
echo       - php artisan route:list
echo       - composer install / update
echo ===============================================================================
echo.

cmd /k
