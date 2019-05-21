## Laravel ToDo application (for learning purposes)

# DEVELOPMENT andmebaas ja kasutaja
CREATE DATABASE laravel CHARACTER SET utf8 COLLATE utf8_general_ci;
DB: laravel (CREATE USER laravel@'localhost' IDETIFIED BY 'Tere123';)
user: laravel (GRANT ALL ON laravel.* TO laravel@'localhost';)

php artisan route:list //abivahendid

composer create-project --prefer-dist laravel/laravel project_name