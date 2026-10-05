@echo off
cd /d "%~dp0"

echo ============================================
echo  Omisewa Temple - first time setup
echo ============================================
echo.

echo Step 1 of 3: Installing PHP dependencies...
echo (this can take a few minutes the first time)
composer install

if errorlevel 1 (
    echo.
    echo Something went wrong during composer install.
    echo Make sure the Laravel Herd app is open and has finished its setup.
    pause
    exit /b 1
)

if not exist .env (
    copy .env.example .env >nul
)

echo.
echo Step 2 of 3: Generating application key...
php artisan key:generate

echo.
echo Step 3 of 3: Creating the database and adding content...
php artisan migrate --seed --force

echo.
echo ============================================
echo  Setup complete.
echo  Run serve.bat to start the website, then open:
echo    http://localhost:8000
echo  Admin login:
echo    http://localhost:8000/admin/login
echo ============================================
pause
