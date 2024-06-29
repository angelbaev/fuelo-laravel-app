
# fuelo-laravel-app
The Fuelo API gives read access to the database of prices and gas stations on the fuelo.net website.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling.

## Install abaev-fuelo-client-api

Update composer.json: Add the repository and package information in the composer.json file of your Laravel project.

"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/angelbaev/abaev-fuelo-client-api"
    }
]

"require": {
    "angelbaev/abaev-fuelo-client-api": "dev-main"
}

Run the following command to install the package:
composer require angelbaev/abaev-fuelo-client-api:dev-main

Publish the configuration file (if the package provides one):
php artisan vendor:publish --provider="Angelbaev\FueloClientApi\FueloClientApiServiceProvider"

Configure the package: Open the configuration file (config/fuelo.php or similar) and set the necessary options.

Autoloading
"autoload": {
    "psr-4": {
        "Angelbaev\\FueloClientApi\\": "src/"
    }
}

composer dump-autoload