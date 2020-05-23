## Fleet Management System

Bus booking system that can handle all bus routes tickets.

### First Step

To run the app run the following commands:

1. `git clone https://github.com/mo7amed-3bdalla7/fleet`
1. `cd fleet`
1. `docker-compose up --build -d`
1. `docker-compose run composer install`
1. `cp .env.example .env`
1. `docker exec -it php bash`
1. Into php container tty run `php artisan key:generate`
1. Into php container tty run `php artisan migrate --seed`
1. open [http://127.0.0.1:8000](http://127.0.0.1:8000)
