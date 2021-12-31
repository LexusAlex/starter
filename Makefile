# полная инициализация всего проекта с нуля
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
# инициалиазация фронтенда
frontend-init: npm-install
# загрузить зависимости из файла package-lock.json
npm-install:
	docker-compose run --rm frontend-nodejs-cli npm install
# установка свежих версий пакетов с нуля для фронта
frontend-install-empty:
	docker-compose run --rm frontend-nodejs-cli npm install --save-dev @babel/core @babel/preset-env @babel/register babel-loader browser-sync del gulp gulp-autoprefixer gulp-clean-css gulp-debug gulp-file-include gulp-group-css-media-queries gulp-htmlmin gulp-if gulp-plumber gulp-rename gulp-replace gulp-sass gulp-sourcemaps require-dir sass webpack webpack-stream yargs
