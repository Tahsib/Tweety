# Tweety
Twitter clone site where users can post and follow other users to get their post updates and can like/dislike their posts.

## Installing
* After cloning the project go to the project folder using ```cd``` command on your cmd or terminal.
* Run ```composer install```
* Copy ```.env.example``` file to ```.env``` on the root folder.
* Change the ```DB_DATABASE``` to your database name (in ```.env```)
* Change ```DB_USERNAME``` and ```DB_PASSWORD``` to the username and password (in ```.env```) correspond to your configuration.
* Run ```php artisan key:generate``` to generate key.
* Run ```php artisan migrate``` to migrate the DB tables.
* Run ```npm install``` to install the dependencies.
* Run ```npm run dev```

## Running the project
* Run ```php artisan serve``` to run the project.
* Go to https://localhost:[portNumber] in the browser.

## Built with
* PHP 7
* Laravel 7

