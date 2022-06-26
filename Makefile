#####
# полная инициализация всего проекта с нуля
init: docker-down-clear docker-pull docker-build-pull docker-up-mysql application-init
# инициализация всего приложения
application-init: backend-init
#####
# запуск проекта без баз данных
docker-up:
	docker-compose up -d
# запуск проекта c mysql
docker-up-mysql:
	docker-compose --profile mysql up -d
# запуск проекта c postgres
docker-up-postgres:
	docker-compose --profile postgres up -d
# запуск проекта с двумя базами данных
docker-up-db:
	docker-compose --profile db up -d
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
#####
# инициализация бекенда
backend-init: composer-install
# установка зависимостей composer
composer-install:
	docker-compose run --rm backend-php-cli composer install
# выгрузить обновления
composer-autoload:
	docker-compose run --rm backend-php-cli composer dump-autoload
# проверка обновлений
composer-outdated:
	docker-compose run --rm backend-php-cli composer outdated --direct
# запуск тестов
test:
	docker-compose run --rm backend-php-cli composer test
test-components:
	docker-compose run --rm backend-php-cli composer test-components
test-functional:
	docker-compose run --rm backend-php-cli composer test-functional
test-configuration:
	docker-compose run --rm backend-php-cli composer test-configuration
test-twig:
	docker-compose run --rm backend-php-cli composer test-twig
test-monolog:
	docker-compose run --rm backend-php-cli composer test-monolog
test-slim:
	docker-compose run --rm backend-php-cli composer test-slim
test-http:
	docker-compose run --rm backend-php-cli composer test-http
test-authentication:
	docker-compose run --rm backend-php-cli composer test-authentication
# проверка версий ПО docker
check-version-soft:
	docker-compose run --rm backend-php-cli bash -c 'php --version && composer --version'
	docker exec -it starter_backend-nginx_1 nginx -v
	docker exec -it starter_backend-mysql_1 mysql -V
	#docker exec -it starter_backend-postgres_1 postgres -V
# исправление линтером
php-cs-fixer:
	docker-compose run --rm backend-php-cli composer php-cs-fixer
# проверка линтером
php-cs-fixer-dry-run:
	docker-compose run --rm backend-php-cli composer php-cs-fixer-dry-run
psalm:
	docker-compose run --rm backend-php-cli composer psalm
psalm-dry-run:
	docker-compose run --rm backend-php-cli composer psalm-dry-run
phplint:
	docker-compose run --rm backend-php-cli composer phplint
#####
# Фронтенд
# инициалиазация фронтенда, нужно только в dev окружении
frontend-init: npm-install
# загрузить зависимости из файла package-lock.json
frontend-npm-install:
	docker-compose run --rm frontend-nodejs-cli npm install
frontend-check-update:
	docker-compose run --rm frontend-nodejs-cli npm outdated --depth=0
# установка свежих всех зависимостей с нуля
frontend-install-empty:
	docker-compose run --rm frontend-nodejs-cli npm install --save-dev @babel/core @babel/preset-env @babel/register babel-loader browser-sync del gulp gulp-autoprefixer gulp-clean-css gulp-debug gulp-file-include gulp-group-css-media-queries gulp-htmlmin gulp-if gulp-plumber gulp-rename gulp-replace gulp-sass gulp-sourcemaps require-dir sass webpack webpack-stream yargs bootstrap
# сборка фронта для разработки
frontend-dev-start:
	docker-compose run --rm -p 4000:4000 frontend-nodejs-cli npm run dev
# сборка продовской верстки
frontend-build:
	docker-compose run --rm -p 4000:4000 frontend-nodejs-cli npm run build

# Ansible
ansible-ping:
	ansible all -i infrastructure/backend/development/ansible/inventory/inventory.ini -l Ddev -u root -m ping
ansible-deploy:
	#ansible-playbook -i infrastructure/backend/development/ansible/inventory/inventory.ini infrastructure/backend/development/ansible/all.yml -u root -t preconfig -t soft
	#ansible-playbook -i infrastructure/backend/development/ansible/inventory/inventory.ini infrastructure/backend/development/ansible/all.yml -u root -t php
	#ansible-playbook -i infrastructure/backend/development/ansible/inventory/inventory.ini infrastructure/backend/development/ansible/all.yml -l Ddev -u root -t debian-soft
	#ansible-playbook -i infrastructure/backend/development/ansible/inventory/inventory.ini infrastructure/backend/development/ansible/all.yml -l Ddev -u root -t debian-soft
	ansible-playbook -i infrastructure/backend/development/ansible/inventory/inventory.ini infrastructure/backend/development/ansible/all.yml -l Ddev -u root -t deploy
ansible-deploy-prod:
	ansible-playbook -i infrastructure/backend/development/ansible/inventory/inventory.ini infrastructure/backend/development/ansible/all.yml -l Dprod -u root -t deploy
