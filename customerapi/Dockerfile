FROM php:5.6-apache
MAINTAINER Robert Higgins <robert.h.higgins@gmail.com>

RUN apt-get update && apt-get install -y \  
    libpq-dev \
    postgresql-client
RUN docker-php-ext-install pdo pgsql pdo_pgsql

COPY src/ /var/www/html/
