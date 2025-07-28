# Installation

1. Clone the repository.

2. Run `composer install`

3. Run `cp .env.example .env`

4. Run `php artisan key:generate`

5. Run `php artisan migrate`

6. Run `php artisan serve`

# Laravel Permission in storage

1. Run `sudo chown -R $USER:www-data storage`

2. Run `sudo chown -R $USER:www-data bootstrap/cache`

3. Run `chmod -R 775 storage`

4. Run `chmod -R 775 bootstrap/cache`
