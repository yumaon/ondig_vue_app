mkdir laravel_tmp
cd laravel_tmp/
composer create-project --prefer-dist laravel/laravel .
cd ../
mv laravel_tmp/* ./
mv laravel_tmp/.* ./
rm laravel_tmp/ -rf
ls
composer install
php artisan migrate
