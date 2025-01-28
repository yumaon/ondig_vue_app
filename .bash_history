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
composer require laravel/breeze --dev
php artisan breeze:install vue
composer dump-autoload
php artisan migrate:status
php artisan migrate:rollback
php artisan migrate
php artisan make:model ArtistUser -m
php artisan migrate
php artisan make:controller ArtistUser/Auth/AuthenticatedSessionController
php artisan route:list
php artisan route:list
php artisan route:list
php artisan route:list
php artisan make:controller ArtistUser/Auth/RegisteredUserController
php artisan route:list
php artisan route:list
php artisan route:list
php artisan route:list
php artisan route:list
php artisan route:list
php artisan make:controller Home
php artisan make:migration rename_users_table_to_general_users
php artisan migrate
php artisan make:controller HomeController
php artisan make:model Topic -a
php artisan make:model TopicTag -a
php artisan make:model Tag -a
php artisan make:model TopicComment -a
php artisan make:model  -a
php artisan make:model Genre -a
php artisan make:model Relationship -a
php artisan make:model LiveSchedule -a
php artisan make:model Item -a
php artisan make:model Join -a
php artisan make:model Room -a
php artisan make:model Message -a
php artisan make:controller General/GeneralUserController
php artisan make:controller General/GeneralUserController -r
php artisan make:controller General/ArtistUserController -r
php artisan make:controller General/ProfileController
php artisan make:controller Artist/ProfileController
php artisan make:controller ArtistUser/ProfileController
php artisan make:controller ArtistUser/GeneralUserController
php artisan make:controller ArtistUser/ItemController -a
php artisan make:controller ArtistUser/ItemController -r
php artisan make:controller ArtistUser/LiveScheduleController -r
php artisan make:controller ArtistUser/ArtistUserController -r
php artisan make:controller ArtistUser/TopicController -r
php artisan make:controller ArtistUser/TopicCommentController -r
php artisan make:controller ArtistUser/FavoriteController -r
php artisan make:controller ArtistUser/RelationshipController -r
php artisan make:controller ArtistUser/RoomController -r
php artisan make:controller ArtistUser/MessageController -r
