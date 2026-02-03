@echo off
echo ========================================
echo   Fixing Styling Issues
echo ========================================
echo.

echo [Step 1/5] Clearing Laravel caches...
php artisan view:clear
php artisan config:clear
php artisan cache:clear
echo ✓ Caches cleared
echo.

echo [Step 2/5] Checking if node_modules exists...
if not exist "node_modules\" (
    echo Installing npm dependencies...
    call npm install
) else (
    echo ✓ node_modules found
)
echo.

echo [Step 3/5] Building assets...
call npm run build
echo ✓ Assets built
echo.

echo [Step 4/5] Clearing browser cache...
echo Please press Ctrl+F5 in your browser to hard refresh
echo.

echo [Step 5/5] Starting development server...
echo.
echo ========================================
echo   Ready! Your styles should now work.
echo ========================================
echo.
echo Starting Vite dev server...
echo Press Ctrl+C to stop the server
echo.
call npm run dev
