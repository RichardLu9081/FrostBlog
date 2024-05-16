
@echo off
cd /d  C:\phpstudy\WWW\Frost\
php artisan schedule:run >> NUL 2>&1
