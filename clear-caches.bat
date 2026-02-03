@echo off
echo Clearing Laravel caches...
echo.

echo [1/3] Clearing view cache...
php artisan view:clear

echo [2/3] Clearing config cache...
php artisan config:clear

echo [3/3] Clearing application cache...
php artisan cache:clear

echo.
echo ✓ All caches cleared successfully!
echo.
echo You can now refresh your browser.
pause
