FROM php:8.1-apache

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install libpq-dev -y \
    && apt-get install git -y \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install -j$(nproc) pdo_pgsql

RUN /usr/sbin/a2enmod rewrite

COPY default.conf /etc/apache2/sites-available/000-default.conf

RUN chmod -R 777 /var/www/html
