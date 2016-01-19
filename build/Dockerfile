FROM php:5.6-apache

RUN apt-get update && apt-get install -yy php5-mysql php5-sqlite libsqlite3-dev php5-pgsql libpq-dev
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite pdo_pgsql
