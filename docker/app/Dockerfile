FROM php:8.1-apache
COPY . /var/www/html
WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install libpq-dev -y \
    && apt-get install git -y \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo_pgsql