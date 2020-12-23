source:
https://laravel-news.com/your-first-laravel-application

init a laravel 7 project
composer create-project --prefer-dist laravel/laravel links_with_tests "7.\*"

composer require laravel/ui "^2.0"

php artisan ui bootstrap --auth

npm install && npm run dev

php artisan make:migration create_links_table --create=links

php artisan make:model --factory Link

php artisan make:seeder LinksTableSeeder

--- test

As of Laravel 7, the project’s phpunit.xml file configures an in-memory SQLite database. If you’re using an older version of Laravel, change the database connection by adding the following:

// uncomment those 2 lines:

<php>
        <!-- ... -->
    <env name="DB_CONNECTION" value="sqlite"/>
    <env name="DB_DATABASE" value=":memory:"/>
        <!-- ... -->
</php>

Next, remove the placeholder test that ships with Laravel:

`rm tests/Feature/ExampleTest.php`

`php artisan make:test SubmitLinksTest`

it creates a test.

use RefreshDatabase; in the class.

Let’s run our first test to make sure things pass as expected. Laravel 7 adds a new artisan test command, or you can use phpunit:

`php artisan test`

# Or run phpunit directly

`vendor/bin/phpunit`

? failure:
could not find driver (SQL: PRAGMA foreign_keys = ON;)

//didn't work
sudo apt-get install sqlite3

//worked:
sudo apt-get install php-sqlite3

failure:
Warning: Your XML configuration validates against a deprecated schema.
Suggestion: Migrate your XML configuration using "--migrate-configuration"!

I found:
vendor/phpunit/phpunit/phpunit tests/Feature/ProjectTest.php --migrate-configuration

I did:
vendor/phpunit/phpunit/phpunit tests/Feature/SubmitLinksTest.php --migrate-configuration

program answer:
Created backup: /home/bazs/code/links_with_tests/phpunit.xml.bak
Migrated configuration: /home/bazs/code/links_with_tests/phpunit.xml
