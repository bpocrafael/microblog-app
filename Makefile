<<<<<<< HEAD
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

backend:
	docker exec -it backend /bin/bash

database:
	docker exec -it database /bin/bash

migrate_db:
	if ! [ -f ./src/backend/.env ];then cp ./src/backend/.env.example ./src/backend/.env;fi
	docker-compose exec -it backend php artisan key:generate
	docker-compose exec -it backend php artisan optimize:clear
	docker-compose exec -it backend php artisan passport:install --force
	docker-compose exec -it backend php artisan migrate:fresh --seed
	docker-compose exec -it backend php artisan module:seed

optimize:
<<<<<<< HEAD
<<<<<<< HEAD
	docker-compose exec -it backend php artisan optimize:clear
=======
	docker-compose exec -it backend php artisan optimize:clear
>>>>>>> 712d128 (Fixed Dockerfile)
=======
	docker-compose exec -it backend php artisan optimize:clear
>>>>>>> 46377d1 (Added new line)
=======
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

backend:
	docker exec -it backend /bin/bash

database:
	docker exec -it database /bin/bash

migrate_db:
	if ! [ -f ./src/backend/.env ];then cp ./src/backend/.env.example ./src/backend/.env;fi
	docker-compose exec -it backend php artisan key:generate
	docker-compose exec -it backend php artisan optimize:clear
	docker-compose exec -it backend php artisan passport:install --force
	docker-compose exec -it backend php artisan migrate:fresh --seed
	docker-compose exec -it backend php artisan module:seed

optimize:
	docker-compose exec -it backend php artisan optimize:clear
>>>>>>> b5430e2 (Setting permission to use in WSL)
