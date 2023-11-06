# Installation

    - php artisan storage:link
    - change .env FILESYSTEM_DISK=public
    - add Model::preventLazyLoading(), Model::preventsSilentlyDiscardingAttributes(), DB::whenQueryingForLongerThan()
    to AppServiceProvier.php
    - composer require barryvdh/laravel-debugbar --dev
    - composer require laravel/telescope then php artisan telescope:install
    - php artisan shop:install
    - make .env and .env.testing from .env.example !!!IMPORTANT!!!
