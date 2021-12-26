# полная инициализация всего проекта
init: docker-down-clear docker-pull docker-build-pull docker-up
# остановка проекта
down: docker-down-clear
# запуск проекта
docker-up:
	docker-compose up -d
# остановить контейнеры поднятые командой docker-compose up
docker-down:
	docker-compose down --remove-orphans
# перезапуск контейнеров
docker-restart:
	docker-compose restart
# остановка проекта + удаление томов
docker-down-clear:
	docker-compose down -v --remove-orphans
# скачать образы
docker-pull:
	docker-compose pull
# скачать образы и собрать образы
docker-build-pull:
	docker-compose build --pull
# инициализация бекенда
backend-init: composer-install
# установка зависимостей composer
composer-install:
	docker-compose run --rm backend-php-cli composer install
# запуск тестов
test:
	docker-compose run --rm backend-php-cli composer test
