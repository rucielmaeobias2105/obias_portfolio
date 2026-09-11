@echo off
REM =====================================================
REM  Start the portfolio dev server
REM  Laravel 13 requires PHP >= 8.3. Your default `php`
REM  on PATH may be 8.0 (XAMPP), so we prefer PHP 8.3
REM  if it is installed.
REM =====================================================
setlocal enableextensions

set "PHP=C:\xampp\php\php.exe"
if exist "C:\xampp\php83\php.exe" set "PHP=C:\xampp\php83\php.exe"

echo Using: %PHP%
"%PHP%" -r "echo 'PHP '.phpversion().PHP_EOL;"

echo.
echo Starting Laravel dev server on http://127.0.0.1:8000
echo Press Ctrl+C to stop.
echo.
"%PHP%" artisan serve
