@echo off
cd /d "%~dp0"

echo Starting the Omisewa Temple website...
echo Open http://localhost:8000 in your browser.
echo Press Ctrl+C to stop.

php artisan serve --no-reload
