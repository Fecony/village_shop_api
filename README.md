# mini Village Market API

Village Shop API that can list products depending on age, create new products with image and to delete existing
products.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing
purposes.

### Prerequisites

Things you will need:

- [PHP](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/download/)
- [Docker](https://docs.docker.com/get-docker/) (optional)
- [Laravel Valet](https://laravel.com/docs/9.x/valet) (optional)

Things you might need to test API:

- [Postman](https://www.postman.com/downloads/)
- [Insomnia](https://insomnia.rest/download)

> Make sure you have all required PHP extensions installed on your local
> machine https://laravel.com/docs/8.x/deployment#server-requirements

## Installation

Clone the project

```bash
git clone git@github.com:Fecony/village_shop_api.git
```

Go to the project directory

```bash
cd village_shop_api
```

Copy .env.example file to .env on the root folder.

```bash
cp .env.example .env
```

### Docker Path 🐳

By default, application is configured to run in Docker container. You don't have to change any environment configuration
setting.

> This command will run Docker container to install application dependencies
> You can refer to Laravel
> Sail [docs](https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects) for other useful
> commands!

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Run `./vendor/bin/sail artisan key:generate` to generate app key.

Run `./vendor/bin/sail artisan storage:link` to create the symbolic link.

To run app in Docker container make sure that Docker is running.

```bash
./vendor/bin/sail up -d
```

After you application is running in Docker container run `./vendor/bin/sail artisan migrate` to run migration files.
And also run `./vendor/bin/sail artisan db:seed` to seed your database.

### Laravel Valet Path

```bash
composer install
```

To run application locally you have to change your `.env` file mysql settings.
Change following settings to match your local mysql settings:

```bash
DB_HOST=127.0.0.1
DB_PORT=3306
# Change this settings to match you database name and mysql user
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

Run `php artisan key:generate` to generate app key.
Run `php artisan storage:link` to create the symbolic link.

After that run `php artisan migrate` to run migration files. And also run `php artisan db:seed` to seed your database.

### Product Restocking Job

It is possible to run a job that will restock the products, to do this you need to run:

```bash
php artisan schedule:work
```

Or if you are using Docker:

```bash
./vendor/bin/sail artisan schedule:work
```

## Troubleshooting - Common Problems

This page lists solutions to problems you might encounter. Here is a list of common problems.

### Access denied for user 'sail@172.20.0.3'... | Docker 🐳

- Try to run `./vendor/bin/sail down --rmi all -v`. It will remove all images used by any service and remove named
  volumes.
- (optional) You might run `./vendor/bin/sail build --no-cache` to build image before running next command
- Then run `./vendor/bin/sail up -d` again to build container.

### Issues with product image saving / photo seeder | Storage folder permission issue

Usually it happens when you have wrong permission set on storage folder.

### Cannot start service mysql: Ports are not available: listen tcp 0.0.0.0:3306: bind: address already in use

Most likely you have running mysql service locally. There are 2 solutions to this issue:

- You have to stop your local mysql service to make port 3306 available for docker
- Use `FORWARD_DB_PORT` in your .env to use different port for docker port binding
    - `FORWARD_DB_PORT=3307`

## Authors

- [@fecony](https://www.github.com/fecony)

## Acknowledgements

- Thanks to Taylor Otwell for creating Laravel ✨
- [Readme generator](https://readme.so/)

## Support

For support, contact me [@fecony](https://www.github.com/fecony).

## License

[MIT](https://choosealicense.com/licenses/mit/)
