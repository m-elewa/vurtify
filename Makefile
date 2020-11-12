-include .env
.PHONY: test seed bash up stop down exec

# the first target is the one that executed by default
# run all containers (workspace php-fpm nginx mysql phpmyadmin
# portainer docker-in-docker mailhog)
up:
	@cd laradock && sudo docker-compose up -d --build

test:
	@cd laradock && docker-compose exec --user=laradock workspace php artisan test

seed:
	@cd laradock && docker-compose exec --user=laradock workspace php artisan migrate:fresh --seed

bash:
	@cd laradock && docker-compose exec --user=laradock workspace bash

npm-watch:
	@cd laradock && docker-compose exec --user=laradock workspace npm run watch

# stop all containers
stop:
	@cd laradock && docker-compose stop

down:
	@cd laradock && docker-compose down

# execute a command on the container
# usage example: make exec command="npm run dev"
exec:
ifndef command
	$(error command is required)
endif
	@cd laradock && docker-compose exec --user=laradock workspace $(command)
