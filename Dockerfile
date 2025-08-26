FROM php:8.2-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN apt-get update && apt-get install -y git && rm -rf /var/lib/apt/lists/*
RUN a2enmod rewrite
