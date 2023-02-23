# Project Name

Task

## Installation

1. composer install
2. php artisan migrate --seed
3. php artisan passport:install

## Project Structure

[Overview of the file and folder structure of your Laravel project]

## Custom Functionality

1. For generating personal access token for specific user you should run 
"php artisan authorize:me [email] [password]"
2. You can access email and password from UserSeeder
3. larry.loc/logs (get) - logging for all requests
4. larry.loc/api/store-bio (get/post) - storing JSON
5. larry.loc/api/manipulate-bio (get/post) - manipulating JSON
6. larry.loc/api/user-bios (get) - index
7. larry.loc/api/user-bios/{user-bio} (get) - show
8. larry.loc/api/user-bios/{user-bio} (delete) - destroy

## Contributing

[Instructions for contributing to the project, including how to submit pull requests and report issues]
