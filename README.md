## Assignment
- For each user, we will store their name, password, email, and an arbitrary number of addresses.
- The application will include a form that validates the data and saves the user to the database.
- The application will include an API interface with the following endpoints:
  - a list of all users in JSON format,
  - user detail in JSON format (the user's password will not be included).


## Installation
```bash
    composer install
    npm install
    npm run build
```

Create .env file from .env.example and generate keys:

```bash
    php artisan key:generate
    php artisan config:clear
    php artisan session:table
    php artisan migrate
```

## Run
```bash
    ./artisan serve
```

## API GET Routes

- http://127.0.0.1:8000/api/users
- http://127.0.0.1:8000/api/user/1
