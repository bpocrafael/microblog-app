install:
	docker-compose exec -it php composer install

up:
	docker-compose up -d

down:
	docker-compose down

build:
	docker-compose build

build-no-cache:
	docker-compose build --no-cache

php:
	docker-compose exec -it php

database:
	docker-compose exec -it database

migrate_db:
	if ! [ -f ./src/backend/.env ];then cp ./src/backend/.env.example ./src/backend/.env;fi
	docker-compose exec -it php php artisan key:generate
	docker-compose exec -it php php artisan optimize:clear
	docker-compose exec -it php php artisan passport:install --force
	docker-compose exec -it php php artisan migrate:fresh --seed
	docker-compose exec -it php php artisan module:seed

optimize:
	docker-compose exec -it php php artisan optimize:clear