FROM php:7.1.0-fpm
WORKDIR /app
RUN docker-php-ext-install pdo pdo_mysql
RUN pecl install redis-3.1.0 \
    && docker-php-ext-enable redis