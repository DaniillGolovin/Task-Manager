compose: compose-clear compose-build compose-setup compose-start

compose-start:
	docker compose up --abort-on-container-exit

compose-start-db:
	docker compose up -d db

compose-stop:
	docker compose stop || true

compose-down:
	docker compose down --remove-orphans || true

compose-clear:
	docker compose down -v --remove-orphans || true

compose-logs:
	docker compose logs -f

compose-setup: compose-build
	docker compose run --rm app make setup

compose-bash:
	docker compose run --rm app bash

compose-build:
	docker compose build

compose-console:
	docker compose run --rm app make console

compose-install: compose-app-install compose-frontend-install

compose-app-install:
	docker compose run --rm app make install-app

compose-web-install:
	docker compose run --rm web make install-frontend

compose-database-start:
	docker compose up --build -d db

compose-database-stop:
	docker compose stop db

compose-db-prepare:
	docker compose run --rm app make db-prepare

compose-lint:
	docker compose run --rm app make lint

compose-lint-fix:
	docker compose run --rm app make lint-fix

compose-test:
	docker compose run app make test

compose-test-coverage:
	docker compose run --rm app make test-coverage

compose-check:
	docker compose run --rm app make check

ci:
	docker compose -f docker-compose.ci.yml -p task-manager build ${BUILD_ARGS}
	docker compose -f docker-compose.ci.yml -p task-manager run --rm application make setup
	docker compose -f docker-compose.ci.yml -p task-manager up --abort-on-container-exit
	docker compose -f docker-compose.ci.yml -p task-manager down -v --remove-orphans

ci-solutions:
	docker compose -f docker-compose.ci.yml -p task-manager build ${BUILD_ARGS}
	docker compose -f docker-compose.ci.yml -p task-manager run --rm application make install-app test-solutions
	docker compose -f docker-compose.ci.yml -p task-manager down -v --remove-orphans
