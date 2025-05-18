# Getting Started
Before setting up, make sure to have PHP installed locally on your machine.
You can make use of homebrew if you're on a Mac or Linux. 
On windows, use Herd `https://herd.com`

Here's how to setup the project:
1. Clone the repsitory
2. Install dependences with `composer install`
3. Copy `.env.example` to `.env` and set your database credentials with other configurations
4. Update phinx configurations with `vendor/bin/phinx init` 
5. Update the `phinx.php` file with your database credentials
6. Run `vendor/bin/phinx migrate` to create the database tables
7. Run `php -S localhost:[PORT]` to start the server

## Project structure
I'm trying to see how it works:
1. Test
2. Test
