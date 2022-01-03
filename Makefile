# Проект
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
# обновить образы
docker-build:
	docker-compose build
# скачать образы и собрать образы
docker-build-pull:
	docker-compose build --pull

# Бэкенд
# инициализация бекенда
backend-init: backend-composer-install
# установка зависимостей composer
backend-composer-install:
	docker-compose run --rm backend-php-cli composer install
# выгрузить обновления
backend-composer-autoload:
	docker-compose run --rm backend-php-cli composer dump-autoload
# проверка обновлений
backend-composer-outdated:
	docker-compose run --rm backend-php-cli composer outdated --direct
# запуск тестов
backend-test:
	docker-compose run --rm backend-php-cli composer test
# проверка версий ПО
backend-check-version-soft:
	docker-compose run --rm backend-php-cli bash -c 'php --version && composer --version'
	docker exec -it starter_backend-nginx_1 nginx -v

# Фронтенд
# инициалиазация фронтенда
frontend-init: npm-install
# загрузить зависимости из файла package-lock.json
frontend-npm-install:
	docker-compose run --rm frontend-nodejs-cli npm install
# установка свежих версий пакетов с нуля для фронта
frontend-install-empty:
	docker-compose run --rm frontend-nodejs-cli npm install --save-dev @babel/core @babel/preset-env @babel/register babel-loader browser-sync del gulp gulp-autoprefixer gulp-clean-css gulp-debug gulp-file-include gulp-group-css-media-queries gulp-htmlmin gulp-if gulp-plumber gulp-rename gulp-replace gulp-sass gulp-sourcemaps require-dir sass webpack webpack-stream yargs
frontend-dev-start:
	docker-compose run --rm -p 4000:4000 frontend-nodejs-cli npm run dev

# Ansible
ansible-ping:
	ansible all -i infrastructure/backend/development/ansible/inventory.ini -u root -m ping
