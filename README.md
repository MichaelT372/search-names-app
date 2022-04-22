# Search names app

## Requirements

-   PHP 8.0+
-   MySQL 5.7+

## Set up

-   Clone the repository `git clone https://github.com/MichaelT372/search-names-app.git`
-   Switch to the project directory `cd search-names-app`
-   Install dependencies `composer install`
-   Create the .env file `cp .env.example .env`
-   Generate an application key `php artisan key:generate`
-   Add the DB_HOST, DB_PORT, DB_USERNAME and DB_PASSWORD variables according to your environment
-   Create a new database called `search_names_app`
-   Migrate the database: `php artisan migrate`
-   Seed the database `php artisan db:seed`. This will populate the database using the `database\seeders\PeopleSeeder.php` class which reads data from `names.csv`
-   Alternatively to the 3 previous steps, load the `database.sql` file into your database.
-   Run application `php artisan serve` and open ` http://127.0.0.1:8000` in your web browser.
