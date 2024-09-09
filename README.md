# Task Manager

[![codecov](https://codecov.io/gh/DaniillGolovin/Task-Manager/graph/badge.svg?token=WHVL3OC2JT)](https://codecov.io/gh/DaniillGolovin/Task-Manager)
[![Maintainability](https://api.codeclimate.com/v1/badges/900f3c4c6c2c37d352cd/maintainability)](https://codeclimate.com/github/DaniillGolovin/Task-Manager/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/900f3c4c6c2c37d352cd/test_coverage)](https://codeclimate.com/github/DaniillGolovin/Task-Manager/test_coverage)
[![Visit Website](https://img.shields.io/badge/Visit%20Website-Click%20Here-brightgreen)](http://213.171.6.21:8000)

## Установка

### Предварительные требования

* PHP ^8.3
* Composer
* SQLite for local, PostgreSQL for production

### Локальная установка

Для запуска на локальном интерпретаторе и SQLite:

```sh
make setup # первоначальная установка
make start-app # запуск сервера http://127.0.0.1:8000/
make test # запуск тестов
```

### Запуск с БД PostgreSQL (разворачивается в Docker-контейнере)

1. Установить зависимости и подготовить конфигурационный файл

    ```sh
    make setup
    ```

2. Указать параметры подключения к БД в файле *.env*

    ```dotenv
    DB_CONNECTION=pgsql
    DB_HOST=localhost
    DB_PORT=54320
    DB_DATABASE=postgres
    DB_USERNAME=postgres
    DB_PASSWORD=secret
    ```

3. Запустить контейнер с БД и сгенерировать записи

    ```sh
    make compose-start-db
    make db-prepare
    ```

4. Запустить локальный веб-сервер

    ```sh
    make start-app
    ```

### Установка в Docker

1. Подготовить файл *.env*

    ```sh
    make env-prepare
    ```

2. Указать параметры подключения к БД в файле *.env*

    ```dotenv
    DB_CONNECTION=pgsql
    DB_HOST=db
    DB_PORT=5432
    DB_DATABASE=postgres
    DB_USERNAME=postgres
    DB_PASSWORD=secret
    ```

3. Собрать и запустить приложение

    ```sh
    make compose-setup # собрать проект
    make compose-start # запустить сервер http://127.0.0.1:8000/
    make compose-bash  # запустить сессию bash в docker-контейнере
    make test          # запустить тесты в docker-контейнере
    ```
