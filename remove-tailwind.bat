@echo off
echo ========================================
echo   Removing Tailwind CSS
echo ========================================
echo.

echo [Step 1/5] Clearing Laravel caches...
php artisan view:clear
php artisan config:clear
php artisan cache:clear
echo ✓ Caches cleared
echo.

echo [Step 2/5] Removing Tailwind CSS package...
call npm uninstall @tailwindcss/vite tailwindcss
echo ✓ Tailwind removed
echo.

echo [Step 3/5] Cleaning node_modules...
if exist "node_modules\.vite" (
    rmdir /s /q "node_modules\.vite"
    echo ✓ Vite cache cleared
)
echo.

echo [Step 4/5] Building assets with regular CSS...
call npm run build
echo ✓ Assets built
echo.

echo [Step 5/5] Starting development server...
echo.
echo ========================================
echo   Tailwind CSS removed successfully!
echo   Now using regular CSS only.
echo ========================================
echo.
echo Starting Vite dev server...
echo Press Ctrl+C to stop the server
echo.
call npm run dev
