FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    default-mysql-client \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install mysqli pdo_mysql

RUN a2enmod rewrite

WORKDIR /var/www/html