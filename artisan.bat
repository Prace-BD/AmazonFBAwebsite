@echo off
setlocal

:: Find Laragon PHP
set "PHP_DIR="
for /d %%D in ("C:\laragon\bin\php\php-*") do (
    set "PHP_DIR=%%D"
)

if "%PHP_DIR%"=="" (
    if exist "C:\laragon\bin\php\php.exe" (
        set "PHP_DIR=C:\laragon\bin\php"
    ) else (
        echo [!] Error: Laragon PHP not found in C:\laragon\bin\php
        exit /b 1
    )
)

set "PATH=%PHP_DIR%;C:\laragon\bin\composer;%PATH%"

"%PHP_DIR%\php.exe" "%~dp0artisan" %*
