## Fleet Management System

Bus booking system that can handle all bus routes tickets.

### First Step

To run the app for **first time** run the following commands:

1. `git clone https://github.com/mo7amed-3bdalla7/fleet`
1. `cd fleet`
1. `docker-compose up --build -d`
1. `docker-compose run composer install`
1. `cp .env.example .env`
1. `docker exec -it php bash`
1. Into php container tty run `php artisan key:generate`
1. Into php container tty run `php artisan migrate --seed`
1. open [http://127.0.0.1:8000](http://127.0.0.1:8000)

For future run use:
1. `docker-compose up -d`

### Second Step

Api endpoints documentation i add additional trips and stations endpoints to help in testing

* You can check documentation from [![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/cb60e3b9b785d4f88f9a)

### Third Step

You can run app tests using `docker-compose run composer test`.
